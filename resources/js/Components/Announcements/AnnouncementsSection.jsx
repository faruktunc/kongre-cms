import React, { useEffect, useMemo, useState } from "react";
import { router } from "@inertiajs/react";
import { CalendarDays, FileText, Megaphone } from "lucide-react";
import { getAnnouncements } from "../../Services/apiClientServices";

function toPlainText(html) {
    if (!html || typeof html !== "string") {
        return "";
    }

    if (typeof document === "undefined") {
        return html.replace(/<[^>]+>/g, " ").replace(/\s+/g, " ").trim();
    }

    const element = document.createElement("div");
    element.innerHTML = html;

    return (element.textContent ?? "").replace(/\s+/g, " ").trim();
}

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

function AnnouncementCard({ announcement }) {
    const summary = useMemo(() => toPlainText(announcement.content), [announcement.content]);
    const publishedAt = formatDate(announcement.publishedAt);
    const documents = Array.isArray(announcement.documents) ? announcement.documents : [];

    return (
        <article
            onClick={() => router.visit(announcement.url)}
            className="cursor-pointer rounded-lg border border-gray-200 bg-white p-6 shadow-sm transition hover:border-red-200 hover:shadow-md dark:border-gray-700 dark:bg-gray-900 dark:hover:border-red-800"
        >
            <div className="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
                <div className="min-w-0">
                    <h2 className="text-xl font-bold text-gray-950 dark:text-white">
                        {announcement.title}
                    </h2>
                    {announcement.subtitle ? (
                        <p className="mt-2 text-sm font-medium text-gray-600 dark:text-gray-300">
                            {announcement.subtitle}
                        </p>
                    ) : null}
                </div>

                {publishedAt ? (
                    <div className="inline-flex shrink-0 items-center gap-2 rounded-md border border-gray-200 px-3 py-2 text-sm font-semibold text-gray-600 dark:border-gray-700 dark:text-gray-300">
                        <CalendarDays className="h-4 w-4 text-red-600" />
                        {publishedAt}
                    </div>
                ) : null}
            </div>

            {summary ? (
                <p className="mt-4 line-clamp-3 text-sm leading-6 text-gray-600 dark:text-gray-300">
                    {summary}
                </p>
            ) : null}

            {documents.length > 0 ? (
                <div className="mt-5 flex flex-wrap gap-2">
                    {documents.map((document, index) => (
                        <a
                            key={`${document.url ?? "document"}-${index}`}
                            href={document.url}
                            target="_blank"
                            rel="noreferrer"
                            onClick={(event) => event.stopPropagation()}
                            className="inline-flex items-center gap-2 rounded-md bg-gray-100 px-3 py-2 text-sm font-semibold text-gray-700 transition hover:bg-red-50 hover:text-red-700 dark:bg-gray-800 dark:text-gray-200 dark:hover:bg-red-950/30 dark:hover:text-red-300"
                        >
                            <FileText className="h-4 w-4" />
                            {document.display_name || `Doküman ${index + 1}`}
                        </a>
                    ))}
                </div>
            ) : null}
        </article>
    );
}

export default function AnnouncementsSection() {
    const [announcements, setAnnouncements] = useState([]);
    const [pagination, setPagination] = useState(null);
    const [loading, setLoading] = useState(true);
    const [page, setPage] = useState(1);

    useEffect(() => {
        setLoading(true);

        getAnnouncements(page)
            .then((data) => {
                setAnnouncements(Array.isArray(data?.data) ? data.data : []);
                setPagination(data?.meta ?? null);
            })
            .finally(() => setLoading(false));
    }, [page]);

    const pages = pagination
        ? Array.from({ length: pagination.last_page }, (_, index) => index + 1)
        : [];

    return (
        <section className="min-h-screen bg-gradient-to-r from-gray-50 via-gray-100 to-gray-200 py-14 dark:bg-gradient-to-r dark:from-[#101828] dark:via-[#030712] dark:to-[#1E2939]">
            <div className="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
                <div className="mb-10">
                    <div className="inline-flex items-center gap-2 rounded-md bg-red-50 px-4 py-2 text-sm font-bold text-red-700 dark:bg-red-950/30 dark:text-red-300">
                        <Megaphone className="h-5 w-5" />
                        Duyurular
                    </div>
                    <h1 className="mt-5 text-4xl font-extrabold text-gray-950 dark:text-white">
                        Duyurular
                    </h1>
                </div>

                {loading ? (
                    <div className="space-y-4">
                        {[0, 1, 2].map((item) => (
                            <div
                                key={item}
                                className="h-36 animate-pulse rounded-lg bg-white/80 dark:bg-gray-900"
                            />
                        ))}
                    </div>
                ) : announcements.length > 0 ? (
                    <>
                        <div className="space-y-4">
                            {announcements.map((announcement) => (
                                <AnnouncementCard key={announcement.id} announcement={announcement} />
                            ))}
                        </div>

                        {pagination && pagination.last_page > 1 ? (
                            <div className="mt-8 flex flex-wrap items-center justify-center gap-2">
                                <button
                                    type="button"
                                    onClick={() => setPage((currentPage) => Math.max(1, currentPage - 1))}
                                    disabled={pagination.current_page <= 1}
                                    className="rounded-md border border-gray-200 bg-white px-4 py-2 text-sm font-bold text-gray-700 transition hover:text-red-700 disabled:cursor-not-allowed disabled:opacity-50 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-200 dark:hover:text-red-300"
                                >
                                    Önceki
                                </button>

                                {pages.map((pageNumber) => (
                                    <button
                                        key={pageNumber}
                                        type="button"
                                        onClick={() => setPage(pageNumber)}
                                        className={`h-10 min-w-10 rounded-md px-3 text-sm font-bold transition ${
                                            pagination.current_page === pageNumber
                                                ? "bg-red-600 text-white"
                                                : "border border-gray-200 bg-white text-gray-700 hover:text-red-700 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-200 dark:hover:text-red-300"
                                        }`}
                                    >
                                        {pageNumber}
                                    </button>
                                ))}

                                <button
                                    type="button"
                                    onClick={() => setPage((currentPage) => Math.min(pagination.last_page, currentPage + 1))}
                                    disabled={pagination.current_page >= pagination.last_page}
                                    className="rounded-md border border-gray-200 bg-white px-4 py-2 text-sm font-bold text-gray-700 transition hover:text-red-700 disabled:cursor-not-allowed disabled:opacity-50 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-200 dark:hover:text-red-300"
                                >
                                    Sonraki
                                </button>
                            </div>
                        ) : null}
                    </>
                ) : (
                    <div className="rounded-lg border border-dashed border-gray-300 bg-white px-6 py-12 text-center font-semibold text-gray-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-400">
                        Yayında duyuru bulunmuyor
                    </div>
                )}
            </div>
        </section>
    );
}
