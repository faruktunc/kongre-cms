import React, { useEffect, useState } from "react";
import { ArrowLeft, CalendarDays, FileText } from "lucide-react";
import Lightbox from "yet-another-react-lightbox";
import Thumbnails from "yet-another-react-lightbox/plugins/thumbnails";
import MainLayout from "../Layout/main";
import { getAnnouncement } from "../Services/apiClientServices";
import "yet-another-react-lightbox/styles.css";
import "yet-another-react-lightbox/plugins/thumbnails.css";

function formatDate(value) {
    if (!value) {
        return null;
    }

    return new Intl.DateTimeFormat("tr-TR", {
        day: "2-digit",
        month: "long",
        year: "numeric",
    }).format(new Date(value));
}

export default function Announcement({ announcementSlug }) {
    const [announcement, setAnnouncement] = useState(null);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState(null);
    const [activeGalleryIndex, setActiveGalleryIndex] = useState(0);
    const [isLightboxOpen, setIsLightboxOpen] = useState(false);

    useEffect(() => {
        getAnnouncement(announcementSlug)
            .then((data) => {
                setAnnouncement(data);
                setError(null);
            })
            .catch(() => {
                setError("Duyuru bulunamadı");
            })
            .finally(() => setLoading(false));
    }, [announcementSlug]);

    const gallery = Array.isArray(announcement?.gallery) ? announcement.gallery : [];
    const documents = Array.isArray(announcement?.documents) ? announcement.documents : [];
    const publishedAt = formatDate(announcement?.publishedAt);

    if (loading) {
        return (
            <MainLayout>
                <div className="flex min-h-screen items-center justify-center bg-gradient-to-r from-gray-50 via-gray-100 to-gray-200 dark:from-[#101828] dark:via-[#030712] dark:to-[#1E2939]">
                    <div className="h-12 w-12 animate-spin rounded-full border-b-2 border-red-600" />
                </div>
            </MainLayout>
        );
    }

    if (error || !announcement) {
        return (
            <MainLayout>
                <div className="flex min-h-screen items-center justify-center bg-gradient-to-r from-gray-50 via-gray-100 to-gray-200 dark:from-[#101828] dark:via-[#030712] dark:to-[#1E2939]">
                    <div className="text-center">
                        <p className="mb-4 text-lg text-red-600 dark:text-red-400">
                            {error || "Duyuru bulunamadı"}
                        </p>
                        <a href="/#duyurular" className="font-semibold text-blue-600 hover:underline dark:text-blue-400">
                            Duyurulara dön
                        </a>
                    </div>
                </div>
            </MainLayout>
        );
    }

    return (
        <MainLayout>
            <main className="min-h-screen bg-gradient-to-r from-gray-50 via-gray-100 to-gray-200 py-12 dark:from-[#101828] dark:via-[#030712] dark:to-[#1E2939]">
                <article className="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
                    <a
                        href="/#duyurular"
                        className="mb-8 inline-flex items-center gap-2 rounded-md bg-white px-4 py-2 text-sm font-bold text-gray-700 shadow-sm transition hover:text-red-700 dark:bg-gray-900 dark:text-gray-200 dark:hover:text-red-300"
                    >
                        <ArrowLeft className="h-4 w-4" />
                        Duyurular
                    </a>

                    <div className="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-900 sm:p-8">
                        {publishedAt ? (
                            <div className="mb-5 inline-flex items-center gap-2 rounded-md border border-gray-200 px-3 py-2 text-sm font-semibold text-gray-600 dark:border-gray-700 dark:text-gray-300">
                                <CalendarDays className="h-4 w-4 text-red-600" />
                                {publishedAt}
                            </div>
                        ) : null}

                        <h1 className="text-3xl font-extrabold text-gray-950 dark:text-white sm:text-4xl">
                            {announcement.title}
                        </h1>

                        {announcement.subtitle ? (
                            <p className="mt-4 text-lg font-medium text-gray-600 dark:text-gray-300">
                                {announcement.subtitle}
                            </p>
                        ) : null}

                        {announcement.content ? (
                            <div
                                className="fi-prose mt-8 max-w-none"
                                dangerouslySetInnerHTML={{ __html: announcement.content }}
                            />
                        ) : null}
                    </div>

                    {gallery.length > 0 ? (
                        <section className="mt-8">
                            <h2 className="mb-4 text-2xl font-bold text-gray-950 dark:text-white">
                                Galeri
                            </h2>
                            <div className="rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-900">
                                <button
                                    type="button"
                                    onClick={() => setIsLightboxOpen(true)}
                                    className="w-full overflow-hidden rounded-md bg-black/5 dark:bg-white/5"
                                >
                                    <img
                                        src={gallery[activeGalleryIndex]}
                                        alt={`${announcement.title} ${activeGalleryIndex + 1}`}
                                        className="h-[420px] w-full object-cover"
                                    />
                                </button>
                                <div className="mt-4 flex gap-3 overflow-x-auto pb-2">
                                    {gallery.map((image, index) => (
                                        <button
                                            key={`${image}-${index}`}
                                            type="button"
                                            onClick={() => setActiveGalleryIndex(index)}
                                            className={`shrink-0 overflow-hidden rounded-md border-2 transition ${
                                                activeGalleryIndex === index ? "border-red-600" : "border-transparent"
                                            }`}
                                        >
                                            <img
                                                src={image}
                                                alt={`${announcement.title} thumb ${index + 1}`}
                                                className="h-20 w-28 object-cover"
                                            />
                                        </button>
                                    ))}
                                </div>
                                <Lightbox
                                    open={isLightboxOpen}
                                    close={() => setIsLightboxOpen(false)}
                                    index={activeGalleryIndex}
                                    slides={gallery.map((src) => ({ src }))}
                                    plugins={[Thumbnails]}
                                    thumbnails={{
                                        position: "bottom",
                                        showToggle: false,
                                    }}
                                    on={{
                                        view: ({ index }) => setActiveGalleryIndex(index),
                                    }}
                                />
                            </div>
                        </section>
                    ) : null}

                    {documents.length > 0 ? (
                        <section className="mt-8">
                            <h2 className="mb-4 text-2xl font-bold text-gray-950 dark:text-white">
                                Dokümanlar
                            </h2>
                            <div className="space-y-3">
                                {documents.map((document, index) => (
                                    <a
                                        key={`${document.url ?? "document"}-${index}`}
                                        href={document.url}
                                        target="_blank"
                                        rel="noreferrer"
                                        className="flex items-center gap-3 rounded-lg border border-gray-200 bg-white px-4 py-3 font-semibold text-gray-700 transition hover:bg-red-50 hover:text-red-700 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-200 dark:hover:bg-red-950/30 dark:hover:text-red-300"
                                    >
                                        <FileText className="h-5 w-5" />
                                        {document.display_name || `Doküman ${index + 1}`}
                                    </a>
                                ))}
                            </div>
                        </section>
                    ) : null}
                </article>
            </main>
        </MainLayout>
    );
}
