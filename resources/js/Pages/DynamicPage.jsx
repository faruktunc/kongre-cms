import React, { useEffect, useState } from 'react';
import { getPageBySlug } from '../Services/apiClientServices';
import MainLayout from '../Layout/main';
import ContentRenderer from '../Components/DynamicComponent/ContentRenderer';
import DynamicComponent from '../Utils/dynamicComponent';
import Lightbox from 'yet-another-react-lightbox';
import Thumbnails from 'yet-another-react-lightbox/plugins/thumbnails';
import 'yet-another-react-lightbox/styles.css';
import 'yet-another-react-lightbox/plugins/thumbnails.css';

const PAGE_COMPONENTS = {
    'konusmacilar': 'AboutSpeakers',
    'speakers': 'AboutSpeakers',
    'kongre-takvimi': 'CongreTakvimiSection',
    'kurullar': 'BoardSection',
    'boards': 'BoardSection',
    'iletisim': 'contactSection',
    'contact': 'contactSection',
};

export default function DynamicPage({ pageSlug }) {
    const [page, setPage] = useState(null);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState(null);
    const [activeGalleryIndex, setActiveGalleryIndex] = useState(0);
    const [isLightboxOpen, setIsLightboxOpen] = useState(false);

    useEffect(() => {
        if (!pageSlug) {
            setError('Sayfa bulunamadı');
            setLoading(false);
            return;
        }

        getPageBySlug(pageSlug)
            .then((data) => {
                if (data) {
                    setPage(data);
                    setError(null);
                } else {
                    setError('Sayfa bulunamadı');
                }
            })
            .catch((err) => {
                console.error('Sayfa yükleme hatası:', err);
                setError('Sayfa yüklenirken bir hata oluştu');
            })
            .finally(() => setLoading(false));
    }, [pageSlug]);

    if (loading) {
        return (
            <MainLayout>
                <div className="min-h-screen bg-gradient-to-r from-gray-50 via-gray-100 to-gray-200 dark:bg-gradient-to-r dark:from-[#101828] dark:via-[#030712] dark:to-[#1E2939] flex items-center justify-center">
                    <div className="text-center">
                        <div className="animate-spin rounded-full h-12 w-12 border-b-2 border-blue-500 mx-auto mb-4"></div>
                        <p className="text-gray-600 dark:text-gray-400">Yükleniyor...</p>
                    </div>
                </div>
            </MainLayout>
        );
    }

    if (error || !page) {
        return (
            <MainLayout>
                <div className="min-h-screen bg-gradient-to-r from-gray-50 via-gray-100 to-gray-200 dark:bg-gradient-to-r dark:from-[#101828] dark:via-[#030712] dark:to-[#1E2939] flex items-center justify-center">
                    <div className="text-center">
                        <p className="text-red-600 dark:text-red-400 text-lg mb-4">{error || 'Sayfa bulunamadı'}</p>
                        <a href="/" className="text-blue-500 hover:underline dark:text-blue-400">
                            Ana sayfaya dön
                        </a>
                    </div>
                </div>
            </MainLayout>
        );
    }

    const pageTitle = page.title || page.name;
    const pageSubtitle = page.subtitle;
    const hasStructuredContent = Array.isArray(page.content) && page.content.length > 0;
    const hasRichContent = typeof page.content === 'string' && page.content.trim() !== '';
    const hasGallery = Array.isArray(page.gallery) && page.gallery.length > 0;
    const hasDocuments = Array.isArray(page.documents) && page.documents.length > 0;

    if (hasStructuredContent || hasRichContent || hasGallery || hasDocuments) {
        return (
            <MainLayout>
                <div className="min-h-screen bg-gradient-to-r from-gray-50 via-gray-100 to-gray-200 dark:bg-gradient-to-r dark:from-[#101828] dark:via-[#030712] dark:to-[#1E2939]">
                    <div className="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                        <article>
                            <h1 className="text-4xl font-bold mb-8 text-gray-900 dark:text-white">
                                {pageTitle}
                            </h1>
                            {pageSubtitle ? (
                                <p className="text-lg text-gray-600 dark:text-gray-300 mb-8">{pageSubtitle}</p>
                            ) : null}

                            {hasRichContent ? (
                                <section className="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-900">
                                    <div
                                        className="prose max-w-none dark:prose-invert"
                                        dangerouslySetInnerHTML={{ __html: page.content }}
                                    />
                                </section>
                            ) : null}

                            {hasStructuredContent ? (
                                <section className="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-900 mt-8">
                                    {page.content.map((item, index) => {
                                        if (item.type === 'component') {
                                            return (
                                                <DynamicComponent
                                                    key={`${item.name || 'component'}-${index}`}
                                                    name={item.name}
                                                    props={item.props || {}}
                                                />
                                            );
                                        }

                                        return (
                                            <ContentRenderer
                                                key={`${item.type || 'content'}-${index}`}
                                                content={[item]}
                                            />
                                        );
                                    })}
                                </section>
                            ) : null}

                            {hasGallery ? (
                                <section className="mt-10">
                                    <h2 className="text-2xl font-semibold text-gray-900 dark:text-white mb-5">Galeri</h2>
                                    <div className="rounded-2xl border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-900">
                                        <button
                                            type="button"
                                            onClick={() => setIsLightboxOpen(true)}
                                            className="w-full overflow-hidden rounded-xl bg-black/5 dark:bg-white/5"
                                        >
                                            <img
                                                src={page.gallery[activeGalleryIndex]}
                                                alt={`${pageTitle} ${activeGalleryIndex + 1}`}
                                                className="w-full h-[420px] object-cover"
                                            />
                                        </button>
                                        <div className="mt-4 flex gap-3 overflow-x-auto pb-2">
                                            {page.gallery.map((image, index) => (
                                                <button
                                                    key={`${image}-${index}`}
                                                    type="button"
                                                    onClick={() => setActiveGalleryIndex(index)}
                                                    className={`shrink-0 rounded-lg overflow-hidden border-2 transition ${
                                                        activeGalleryIndex === index
                                                            ? 'border-blue-500'
                                                            : 'border-transparent'
                                                    }`}
                                                >
                                                    <img
                                                        src={image}
                                                        alt={`${pageTitle} thumb ${index + 1}`}
                                                        className="w-28 h-20 object-cover"
                                                    />
                                                </button>
                                            ))}
                                        </div>
                                        <Lightbox
                                            open={isLightboxOpen}
                                            close={() => setIsLightboxOpen(false)}
                                            index={activeGalleryIndex}
                                            slides={page.gallery.map((src) => ({ src }))}
                                            plugins={[Thumbnails]}
                                            thumbnails={{
                                                position: 'bottom',
                                                showToggle: false,
                                            }}
                                            on={{
                                                view: ({ index }) => setActiveGalleryIndex(index),
                                            }}
                                        />
                                    </div>
                                </section>
                            ) : null}

                            {hasDocuments ? (
                                <section className="mt-10">
                                    <h2 className="text-2xl font-semibold text-gray-900 dark:text-white mb-5">Dokümanlar</h2>
                                    <div className="space-y-3">
                                        {page.documents.map((document, index) => (
                                            <a
                                                key={`${document.url || document}-${index}`}
                                                href={document.url || document}
                                                target="_blank"
                                                rel="noreferrer"
                                                className="block rounded-lg border border-gray-200 bg-white px-4 py-3 text-blue-700 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-900 dark:text-blue-300 dark:hover:bg-gray-800"
                                            >
                                                {document.display_name || `Doküman ${index + 1}`}
                                            </a>
                                        ))}
                                    </div>
                                </section>
                            ) : null}
                        </article>
                    </div>
                </div>
            </MainLayout>
        );
    }

    const componentName = PAGE_COMPONENTS[pageSlug];
    
    if (componentName) {
        return (
            <MainLayout>
                <div className="min-h-screen bg-gradient-to-r from-gray-50 via-gray-100 to-gray-200 dark:bg-gradient-to-r dark:from-[#101828] dark:via-[#030712] dark:to-[#1E2939]">
                    <DynamicComponent
                        name={componentName}
                        props={{}}
                    />
                </div>
            </MainLayout>
        );
    }

    return (
        <MainLayout>
            <div className="min-h-screen bg-gradient-to-r from-gray-50 via-gray-100 to-gray-200 dark:bg-gradient-to-r dark:from-[#101828] dark:via-[#030712] dark:to-[#1E2939] flex items-center justify-center">
                <div className="text-center">
                    <p className="text-red-600 dark:text-red-400 text-lg mb-4">
                        Bu sayfanın görüntülenebilir içeriği yok
                    </p>
                    <a href="/" className="text-blue-500 hover:underline dark:text-blue-400">
                        Ana sayfaya dön
                    </a>
                </div>
            </div>
        </MainLayout>
    );
}
