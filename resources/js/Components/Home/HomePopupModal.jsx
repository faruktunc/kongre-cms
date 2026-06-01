import React, { useEffect, useState } from "react";
import { ChevronLeft, ChevronRight, X } from "react-feather";
import { getHomePopups } from "../../Services/apiClientServices";

export default function HomePopupModal() {
    const [popups, setPopups] = useState([]);
    const [currentIndex, setCurrentIndex] = useState(0);
    const [isOpen, setIsOpen] = useState(false);

    useEffect(() => {
        getHomePopups()
            .then((data) => {
                const activePopups = Array.isArray(data)
                    ? data.filter((popup) => popup?.isActive !== false)
                    : [];

                setPopups(activePopups);
                setIsOpen(activePopups.length > 0);
            })
            .catch(() => {
                setPopups([]);
                setIsOpen(false);
            });
    }, []);

    const currentPopup = popups[currentIndex] ?? null;
    const hasMultiplePopups = popups.length > 1;
    const currentTitle = currentPopup?.title?.trim() || "";
    const messageText = (currentPopup?.message || "")
        .replace(/<[^>]*>/g, "")
        .replace(/&nbsp;/g, " ")
        .trim();
    const hasMessage = messageText.length > 0;
    const hasButton = Boolean(
        currentPopup?.buttonUrl && currentPopup?.buttonLabel
    );
    const hasTextContent = Boolean(currentTitle || hasMessage);
    const shouldRenderBody = hasTextContent || hasButton || hasMultiplePopups;

    const closePopup = () => {
        setIsOpen(false);
    };

    const showPrevious = () => {
        setCurrentIndex((index) =>
            index === 0 ? popups.length - 1 : index - 1
        );
    };

    const showNext = () => {
        setCurrentIndex((index) =>
            index === popups.length - 1 ? 0 : index + 1
        );
    };

    if (!isOpen || !currentPopup) {
        return null;
    }

    return (
        <div
            className="fixed inset-0 z-[100] flex items-center justify-center bg-gray-950/70 px-4 py-6 backdrop-blur-sm"
            role="dialog"
            aria-modal="true"
            aria-labelledby={currentTitle ? "home-popup-title" : undefined}
            aria-label={currentTitle ? undefined : "Ana sayfa duyurusu"}
        >
            <div className="relative w-full max-w-2xl overflow-hidden rounded-2xl bg-white shadow-2xl dark:bg-gray-900">
                <button
                    type="button"
                    onClick={closePopup}
                    className="absolute right-3 top-3 z-20 inline-flex h-10 w-10 items-center justify-center rounded-full bg-white/90 text-gray-700 shadow transition hover:bg-red-600 hover:text-white dark:bg-gray-950/80 dark:text-gray-100 dark:hover:bg-red-600 dark:hover:text-white"
                    aria-label="Pop-up mesajını kapat"
                >
                    <X className="h-5 w-5" />
                </button>

                {currentPopup.bannerImage && (
                    <img
                        src={currentPopup.bannerImage}
                        alt={currentTitle || "Pop-up afişi"}
                        className={`w-full object-contain bg-gray-100 dark:bg-gray-950 ${
                            shouldRenderBody ? "max-h-[52vh]" : "max-h-[82vh]"
                        }`}
                    />
                )}

                {shouldRenderBody && (
                    <div className="space-y-4 p-5 sm:p-6">
                        {hasTextContent && (
                            <div>
                                {currentTitle && (
                                    <h2
                                        id="home-popup-title"
                                        className="text-2xl font-bold text-gray-950 dark:text-white"
                                    >
                                        {currentTitle}
                                    </h2>
                                )}
                                {hasMessage && (
                                    <div
                                        className={`prose prose-gray max-w-none dark:prose-invert ${
                                            currentTitle ? "mt-3" : ""
                                        }`}
                                        dangerouslySetInnerHTML={{
                                            __html: currentPopup.message,
                                        }}
                                    />
                                )}
                            </div>
                        )}

                        {(hasButton || hasMultiplePopups) && (
                            <div className="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                                {hasButton ? (
                                    <a
                                        href={currentPopup.buttonUrl}
                                        className="inline-flex min-h-11 items-center justify-center rounded-lg bg-red-600 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-red-700"
                                    >
                                        {currentPopup.buttonLabel}
                                    </a>
                                ) : (
                                    <span />
                                )}

                                {hasMultiplePopups && (
                                    <div className="flex items-center justify-end gap-3">
                                        <button
                                            type="button"
                                            onClick={showPrevious}
                                            className="inline-flex h-10 w-10 items-center justify-center rounded-full border border-gray-200 text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:text-gray-200 dark:hover:bg-gray-800"
                                            aria-label="Önceki pop-up"
                                        >
                                            <ChevronLeft className="h-5 w-5" />
                                        </button>
                                        <span className="min-w-12 text-center text-sm font-medium text-gray-600 dark:text-gray-300">
                                            {currentIndex + 1}/{popups.length}
                                        </span>
                                        <button
                                            type="button"
                                            onClick={showNext}
                                            className="inline-flex h-10 w-10 items-center justify-center rounded-full border border-gray-200 text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:text-gray-200 dark:hover:bg-gray-800"
                                            aria-label="Sonraki pop-up"
                                        >
                                            <ChevronRight className="h-5 w-5" />
                                        </button>
                                    </div>
                                )}
                            </div>
                        )}
                    </div>
                )}
            </div>
        </div>
    );
}
