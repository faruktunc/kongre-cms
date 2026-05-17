import React, { useEffect, useState } from "react";
import { getMenus, getLogo } from "../../Services/apiClientServices";
import {
    Disclosure,
    DisclosureButton,
    DisclosurePanel,
    Menu,
    MenuButton,
    MenuItem,
    MenuItems,
} from "@headlessui/react";
import {
    Bars3Icon,
    XMarkIcon,
    ChevronDownIcon,
} from "@heroicons/react/24/outline";

export default function Header() {
    const [menuItems, setMenuItems] = useState([]);
    const [logo, setLogo] = useState(null);
    const [windowWidth, setWindowWidth] = useState(window.innerWidth);

    useEffect(() => {
        getMenus().then((data) => {
            if (!data) return;
            const links = data.menus?.links ?? data.links ?? [];
            const topLevel = links
                .filter((i) => Number(i.parentId ?? 0) === 0 && i.isActive)
                .sort((a, b) => Number(a.order ?? 0) - Number(b.order ?? 0));
            setMenuItems(topLevel);
        });

        getLogo().then((data) => {
            if (data) setLogo(data);
        });

        const handleResize = () => setWindowWidth(window.innerWidth);
        window.addEventListener("resize", handleResize);
        return () => window.removeEventListener("resize", handleResize);
    }, []);

    const classNames = (...classes) => classes.filter(Boolean).join(" ");

    const parentMenus = menuItems
        .filter((i) => Number(i.parentId ?? 0) === 0)
        .sort((a, b) => Number(a.order ?? 0) - Number(b.order ?? 0));

    const getSubMenus = (parentId) =>
        menuItems
            .filter((i) => Number(i.parentId ?? 0) === Number(parentId))
            .sort(
                (a, b) =>
                    Number(a["child-order"] ?? a["childOrder"] ?? 0) -
                    Number(b["child-order"] ?? b["childOrder"] ?? 0)
            );

    return (
        <Disclosure
            as="nav"
            className="sticky top-0 z-50 border-b border-gray-200 dark:border-gray-700 bg-gradient-to-r from-gray-50 via-white to-gray-50 dark:from-[#101828] dark:via-[#030712] dark:to-[#1E2939] shadow-md transition-colors duration-300 overflow-visible"
        >
            {({ open, close }) => {
                useEffect(() => {
                    if (windowWidth >= 1024 && open) close();
                }, [windowWidth, open, close]);

                return (
                    <>
                        {/* Header Container */}
                        <div className="mx-auto w-full px-2 sm:px-4 lg:px-6 overflow-visible">
                            <div className="flex justify-between items-center h-20 sm:h-24 lg:h-28">
                                {/* Logo */}
                                {logo && (
                                    <a
                                        href="/"
                                        className="flex items-center flex-shrink-0"
                                    >
                                        <img
                                            src={logo.src}
                                            alt="Logo"
                                            className="h-14 sm:h-18 lg:h-24 w-auto object-contain"
                                        />
                                    </a>
                                )}

                                {/* Masaüstü Menü - Tek Satır */}
                                <div className="hidden lg:flex items-center gap-0.5 xl:gap-1 justify-end flex-nowrap">
                                    {parentMenus.map((parent) => {
                                        const subMenus = getSubMenus(parent.id);
                                        if (subMenus.length > 0) {
                                            return (
                                                <Menu
                                                    as="div"
                                                    key={parent.id}
                                                    className="relative"
                                                >
                                                    {({ open: menuOpen }) => (
                                                        <>
                                                            <MenuButton
                                                                className={classNames(
                                                                    "flex items-center gap-2 px-4 lg:px-4 xl:px-5 py-3 rounded-lg font-semibold text-base lg:text-base xl:text-lg whitespace-nowrap",
                                                                    "text-gray-800 dark:text-gray-200",
                                                                    menuOpen 
                                                                        ? "bg-gray-200 dark:bg-gray-700" 
                                                                        : "hover:bg-gray-100 dark:hover:bg-gray-800",
                                                                    "transition-colors duration-200"
                                                                )}
                                                            >
                                                                {parent.name}
                                                                <ChevronDownIcon
                                                                    className={classNames(
                                                                        "h-5 w-5 transition-transform duration-300",
                                                                        menuOpen
                                                                            ? "rotate-180"
                                                                            : ""
                                                                    )}
                                                                />
                                                            </MenuButton>

                                                            <MenuItems
                                                                className={classNames(
                                                                    "absolute right-0 mt-2 w-44 lg:w-48 rounded-lg shadow-lg ring-1 ring-black/10 dark:ring-white/10",
                                                                    "bg-white dark:bg-gray-900 overflow-hidden z-50"
                                                                )}
                                                            >
                                                                {subMenus.map(
                                                                    (sub) => (
                                                                        <MenuItem
                                                                            key={
                                                                                sub.id
                                                                            }
                                                                        >
                                                                            <a
                                                                                href={
                                                                                    sub.url
                                                                                }
                                                                                className="block px-4 py-2.5 text-base text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors duration-150"
                                                                            >
                                                                                {
                                                                                    sub.name
                                                                                }
                                                                            </a>
                                                                        </MenuItem>
                                                                    )
                                                                )}
                                                            </MenuItems>
                                                        </>
                                                    )}
                                                </Menu>
                                            );
                                        }
                                        return (
                                            <a
                                                key={parent.id}
                                                href={parent.url}
                                                className="px-4 lg:px-4 xl:px-5 py-3 rounded-lg text-base lg:text-base xl:text-lg font-semibold text-gray-800 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors duration-200 whitespace-nowrap"
                                            >
                                                {parent.name}
                                            </a>
                                        );
                                    })}
                                </div>

                                {/* Mobil Menü Butonu */}
                                <div className="flex lg:hidden">
                                    <DisclosureButton className="inline-flex items-center justify-center p-3 rounded-lg text-gray-800 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors duration-200">
                                        {open ? (
                                            <XMarkIcon className="w-8 h-8" />
                                        ) : (
                                            <Bars3Icon className="w-8 h-8" />
                                        )}
                                    </DisclosureButton>
                                </div>
                            </div>
                        </div>

                        {/* Mobil Menü Paneli */}
                        <DisclosurePanel className="lg:hidden bg-gray-50 dark:bg-gray-900 border-t border-gray-200 dark:border-gray-700">
                            <div className="px-2 py-2 space-y-1">
                                {parentMenus.map((parent) => {
                                    const subMenus = getSubMenus(parent.id);
                                    if (subMenus.length > 0) {
                                        return (
                                            <Disclosure
                                                key={parent.id}
                                                as="div"
                                            >
                                                {({ open: subOpen }) => (
                                                    <>
                                                        <DisclosureButton className="flex w-full justify-between items-center px-5 py-4 rounded-md text-gray-800 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-800 transition-colors duration-150 font-semibold text-lg">
                                                            <span>
                                                                {parent.name}
                                                            </span>
                                                            <ChevronDownIcon
                                                                className={classNames(
                                                                    "h-7 w-7 transition-transform duration-300",
                                                                    subOpen
                                                                        ? "rotate-180"
                                                                        : ""
                                                                )}
                                                            />
                                                        </DisclosureButton>
                                                        <DisclosurePanel className="pl-4 mt-1 space-y-1">
                                                            {subMenus.map(
                                                                (sub) => (
                                                                    <a
                                                                        key={
                                                                            sub.id
                                                                        }
                                                                        href={
                                                                            sub.url
                                                                        }
                                                                        className="block px-5 py-3 rounded-md text-lg text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-800 transition-colors duration-150"
                                                                    >
                                                                        {
                                                                            sub.name
                                                                        }
                                                                    </a>
                                                                )
                                                            )}
                                                        </DisclosurePanel>
                                                    </>
                                                )}
                                            </Disclosure>
                                        );
                                    }
                                    return (
                                        <a
                                            key={parent.id}
                                            href={parent.url}
                                            className="block px-5 py-4 rounded-md text-lg font-semibold text-gray-800 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-800 transition-colors duration-150"
                                        >
                                            {parent.name}
                                        </a>
                                    );
                                })}
                            </div>
                        </DisclosurePanel>
                    </>
                );
            }}
        </Disclosure>
    );
}
