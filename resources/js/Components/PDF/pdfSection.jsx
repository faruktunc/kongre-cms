import React, { useEffect, useRef, useState } from "react";
import WebViewer from "@pdftron/webviewer";
import { getPdf } from "../../Services/apiClientServices";

const PdfSection = () => {
    const viewerRef = useRef(null);
    const [pdfData, setPdfData] = useState(null);
    const [loading, setLoading] = useState(true);

    useEffect(() => {
        getPdf().then((data) => {
            setPdfData(data);
            setLoading(false);
        });
    }, []);

    useEffect(() => {
        if (!pdfData?.url) return;

        WebViewer(
            {
                path: "/webviewer/lib",
                initialDoc: pdfData.url,
                licenseKey: "",
                disabledElements: [
                    "toolbarGroup-Insert", // Insert araçları
                    "toolbarGroup-Edit", // Edit araçları
                    "toolbarGroup-FillSign", // Fill & Sign araçları
                    "toolbarGroup-Forms", // Forms araçları
                    "toolbarGroup-Select", // Select araçları
                    "menuButton", // Ayarlar burayı sakın açma tamam mı 
                ],
            },
            viewerRef.current
        ).then((instance) => {
            const { docViewer, displayModeManager } = instance;

            docViewer.on("documentLoaded", () => {
                setNumPages(docViewer.getPageCount());
                setCurrentPage(1);
                displayModeManager.setDisplayMode(
                    displayModeManager.getDisplayMode(3)
                );
            });

            docViewer.on("pageNumberUpdated", (page) => setCurrentPage(page));
            docViewer.on("zoomUpdated", (zoomLevel) => setZoom(zoomLevel));
        });
    }, [pdfData]);

    if (loading) {
        return (
            <div className="flex items-center justify-center min-h-screen">
                <p>PDF Yükleniyor...</p>
            </div>
        );
    }

    return (
        <section className="min-h-screen py-10 bg-gray-50 dark:bg-gray-900">
            <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div
                    ref={viewerRef}
                    style={{
                        height: "80vh",
                        borderRadius: "12px",
                        overflow: "hidden",
                    }}
                    className="border border-gray-200 dark:border-gray-700 shadow-2xl"
                />
            </div>
        </section>
    );
};

export default PdfSection;
