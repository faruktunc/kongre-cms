import React, { useEffect, useState } from "react";
import { getSponsors } from "../../Services/apiClientServices";

const SponsorsSection = () => {
    const [sponsors, setSponsors] = useState([]);

    useEffect(() => {
        getSponsors().then((data) => {
            const filtered = data
                .filter((s) => s.show && s.isActive)
                .sort((a, b) => a.order - b.order);
            setSponsors(filtered);
        });
    }, []);

    const duplicatedSponsors = [...sponsors, ...sponsors];

    return (
        <section
            id="sponsors"
            className="py-40 dark:bg-[#101828] dark:bg-gradient-to-r dark:from-[#101828] dark:via-[#030712] dark:to-[#1E2939] bg-gradient-to-r from-gray-50 via-gray-100 to-gray-200 overflow-hidden"
        >
            <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-12 text-center">
                <h2 className="text-4xl md:text-5xl font-bold dark:text-white text-gray-800 mb-4">
                    Sponsorlarımız
                </h2>
                <p className="text-xl dark:text-gray-30000 text-gray-400">
                    Etkinliğimizi destekleyen değerli markalar
                </p>
            </div>
            <div className="relative w-full overflow-hidden">
                <div className="absolute inset-y-0 left-0 w-48 dark:bg-gradient-to-r dark:from-gray-950 dark:to-transparent z-10 bg-gradient-to-r from-gray-300 to-transparent" />
                <div className="absolute inset-y-0 right-0 w-48 dark:bg-gradient-to-l dark:from-gray-950 dark:to-transparent z-10 bg-gradient-to-l from-gray-300 to-transparent"/>
                <div className="flex flex-nowrap animate-infinite-scroll">
                    {duplicatedSponsors.map((sponsor, index) => (
                        <div
                            key={`${sponsor.id}-${index}`}
                            className="flex-shrink-0 mx-6 w-64 h-64 flex items-center justify-center"
                        >
                            <img
                                src={sponsor.imgsrc}
                                alt={sponsor.name}
                                className="w-30 h-30 object-contain transition-all duration-300"
                            />
                        </div>
                    ))}
                </div>
            </div>

            <style>{`
                @keyframes infinite-scroll {
                    0% {
                        transform: translateX(0);
                    }
                    100% {
                        transform: translateX(-50%);
                    }
                }

                .animate-infinite-scroll {
                    display: flex;
                    animation: infinite-scroll 40s linear infinite;
                }

                .animate-infinite-scroll:hover {
                    animation-play-state: paused;
                }
            `}</style>
        </section>
    );
};

export default SponsorsSection;
