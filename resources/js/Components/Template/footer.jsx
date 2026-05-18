import React, { useEffect, useState } from "react";
import { getMenus, getLogo } from "../../Services/apiClientServices";
import {
    FaInstagram,
    FaLinkedin,
    FaFacebook,
    FaYoutube,
    FaGithub,
} from "react-icons/fa";
import { FaXTwitter } from "react-icons/fa6";

const iconMap = {
    instagram: FaInstagram,
    x: FaXTwitter,
    linkedin: FaLinkedin,
    facebook: FaFacebook,
    youtube: FaYoutube,
    github: FaGithub,
};

export default function Footer() {
    const [footer, setFooter] = useState({ links: [], socials: [] });
    const [logo, setLogo] = useState([]);
    const currentYear = new Date().getFullYear();

    useEffect(() => {
        getMenus().then((data) => {
            if (data) {
                // link dizisini al, parentId'si 0 olanları filtrele
                const filteredLinks = (data.links ?? []).filter(
                    (item) => Number(item.parentId ?? 0) <= 0 && item.isActive
                );

                // sırala
                const sortedLinks = [...filteredLinks].sort(
                    (a, b) => (a.order ?? 0) - (b.order ?? 0)
                );

                // sosyal medya sıralaması
                const sortedSocials = [...(data.socials ?? [])].sort(
                    (a, b) => (a.order ?? a.id) - (b.order ?? b.id)
                );

                setFooter({
                    links: sortedLinks,
                    socials: sortedSocials,
                });

                console.log("Footer Data:", {
                    links: sortedLinks,
                    socials: sortedSocials,
                });
            }
        });

        getLogo().then((data) => {
            if (data) setLogo(data);
        });
    }, []);

    return (
        <div className="dark:bg-gradient-to-bl dark:from-gray-900 dark:to-gray-950 bg-gradient-to-b from-gray-50 to-gray-100 dark:text-primary-100 inset-shadow-xs max-w-9xl mx-auto px-4 sm:px-6 lg:px-8 py-8 grid grid-cols-1 gap-10 justify-items-center">
            {/* Logo */}
            <div className="flex flex-wrap justify-center gap-6">
                {logo && (
                    <div className="flex items-center">
                        <a
                            href="/"
                            className="flex items-center space-x-3 h-10 sm:h-14 md:h-24 lg:h-28"
                        >
                            <img
                                src={logo.src}
                                alt="Logo"
                                className="h-10 sm:h-14 md:h-24 lg:h-28 w-auto"
                            />
                        </a>
                    </div>
                )}
            </div>

            {/* 🧭 Linkler */}
            <div className="flex flex-wrap justify-center gap-6">
                {footer.links.map((item) => (
                    <a
                        key={item.slug ?? item.url ?? item.id}
                        href={item.url}
                        className="px-4 py-2 text-sm font-medium text-dark-700 dark:text-gray-200 hover:text-dark-900 dark:hover:text-primary-25 transition"
                    >
                        {item.name}
                    </a>
                ))}
            </div>

            {/* 🌐 Sosyal Medya Iconları */}
            <div className="flex flex-wrap justify-center gap-8">
                {footer.socials.map((social) => {
                    const IconComponent = iconMap[social.platform];
                    return (
                        IconComponent && (
                            <a
                                key={`${social.platform ?? "social"}-${social.url ?? social.id}`}
                                href={social.url}
                                target="_blank"
                                rel="noopener noreferrer"
                            >
                                <IconComponent className="h-6 w-6 text-dark-900 dark:text-gray-200 hover:opacity-80 transition cursor-pointer" />
                            </a>
                        )
                    );
                })}
            </div>

            {/* 📄 Telif Hakkı */}
            <div className="text-center text-sm mt-4 dark:text-gray-200">
                Copyright © {currentYear} {" "}
                . All rights reserved.
            </div>
        </div>
    );
}
