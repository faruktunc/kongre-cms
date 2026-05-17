import React, { useEffect, useState } from 'react';
import { getPageBySlug } from '../Services/apiClientServices';
import MainLayout from '../Layout/main';
import ContentRenderer from '../Components/DynamicComponent/ContentRenderer';
import DynamicComponent from '../Utils/dynamicComponent';

const PAGE_COMPONENTS = {
    'konusmacilar': 'AboutSpeakers',
    'speakers': 'AboutSpeakers',
    'kurullar': 'BoardSection',
    'boards': 'BoardSection',
    'iletisim': 'contactSection',
    'contact': 'contactSection',
    'pdf': 'pdfSection',
    'info': 'infoPdfSection'
};

export default function DynamicPage({ pageSlug }) {
    const [page, setPage] = useState(null);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState(null);

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

    if (page.content && page.content.length > 0) {
        return (
            <MainLayout>
                <div className="min-h-screen bg-gradient-to-r from-gray-50 via-gray-100 to-gray-200 dark:bg-gradient-to-r dark:from-[#101828] dark:via-[#030712] dark:to-[#1E2939]">
                    <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                        <article>
                            <h1 className="text-4xl font-bold mb-8 text-gray-900 dark:text-white">
                                {page.title}
                            </h1>
                            
                            {page.content.map((item, index) => {
                                if (item.type === 'component') {
                                    return (
                                        <DynamicComponent
                                            key={index}
                                            name={item.name}
                                            props={item.props || {}}
                                        />
                                    );
                                }
                                
                                return (
                                    <ContentRenderer
                                        key={index}
                                        content={[item]}
                                    />
                                );
                            })}
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