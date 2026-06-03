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
import {
    Award,
    BarChart,
    BookOpen,
    Briefcase,
    Calendar,
    FlaskConical,
    Globe,
    GraduationCap,
    Handshake,
    Heart,
    Lightbulb,
    MessageCircle,
    Mic,
    Network,
    Rocket,
    Star,
    Target,
    Trophy,
    Users,
    Zap,
} from "lucide-react";

const boardIconMap = {
    Users,
    Star,
    BookOpen,
    Award,
    Lightbulb,
    Globe,
    Briefcase,
    Mic,
    GraduationCap,
    Handshake,
    Zap,
    Heart,
    Target,
    Trophy,
    FlaskConical,
    Network,
    BarChart,
    Calendar,
    MessageCircle,
    Rocket,
};

function BoardIcon({ icon, className }) {
    const Icon = boardIconMap[icon] ?? Users;

    return <Icon className={className} />;
}

function BoardMembersPanel({ board }) {
    if (!board) {
        return (
            <div className="flex min-h-72 items-center justify-center text-sm font-semibold text-gray-500 dark:text-gray-400">

            </div>
        );
    }

    const members = Array.isArray(board.members) ? board.members : [];

    return (
        <div className="h-full p-10">
            <div className="min-w-0">


                {members.length > 0 ? (
                    <div className="grid max-h-80 grid-cols-1 gap-3 overflow-y-auto pr-2 xl:grid-cols-2">
                        {members.map((member, index) => (
                            <div
                                key={`${member.name ?? "member"}-${index}`}
                                className="rounded-md border border-gray-200 bg-white px-4 py-3 dark:border-gray-700 dark:bg-gray-900"
                            >
                                <p className="font-bold text-gray-950 dark:text-white">
                                    {member.name}
                                </p>
                                {member.title ? (
                                    <p className="mt-1 text-sm text-gray-600 dark:text-gray-300">
                                        {member.title}
                                    </p>
                                ) : null}
                                {member.institution ? (
                                    <p className="mt-1 text-xs font-medium text-gray-500 dark:text-gray-400">
                                        {member.institution}
                                    </p>
                                ) : null}
                            </div>
                        ))}
                    </div>
                ) : (
                    <div className="rounded-md border border-dashed border-gray-300 bg-gray-50 px-4 py-8 text-center text-sm font-semibold text-gray-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-400">
                        Bu kurul için üye girilmemiş
                    </div>
                )}
            </div>
        </div>
    );
}

function BoardsMegaMenu({ parent, classNames }) {
    const boards = Array.isArray(parent.boards) ? parent.boards : [];
    const [activeBoardId, setActiveBoardId] = useState(null);
    const activeBoard = boards.find((board) => board.id === activeBoardId) ?? null;

    return (
        <Menu as="div" key={parent.id} className="relative">
            {({ open: menuOpen }) => (
                <>
                    <MenuButton
                        className={classNames(
                            "flex items-center gap-2 px-4 lg:px-4 xl:px-5 py-3 font-semibold text-base lg:text-base xl:text-lg whitespace-nowrap transition-colors duration-200",
                            menuOpen
                                ? "bg-red-600 text-white"
                                : "rounded-lg text-gray-800 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-800"
                        )}
                    >
                        {parent.name}
                        <ChevronDownIcon
                            className={classNames(
                                "h-5 w-5 transition-transform duration-300",
                                menuOpen ? "rotate-180" : ""
                            )}
                        />
                    </MenuButton>

                    <MenuItems className="fixed left-0 right-0 top-20 z-50 h-[420px] overflow-hidden border-t border-gray-200 bg-white shadow-xl outline-none dark:border-gray-700 dark:bg-gray-950 sm:top-24 lg:top-28">
                        <div className="grid h-full grid-cols-[292px_380px_minmax(0,1fr)]">
                            <div className="flex items-center justify-center bg-red-600 px-8">
                                <span className="text-3xl font-extrabold uppercase tracking-wide text-white">
                                    {parent.name}
                                </span>
                            </div>

                            <div className="bg-gray-50 dark:bg-gray-900">
                                {boards.length > 0 ? (
                                    boards.map((board) => {
                                        const isActive = board.id === activeBoard?.id;

                                        return (
                                            <button
                                                key={board.id}
                                                type="button"
                                                onClick={() => setActiveBoardId(board.id)}
                                                className={classNames(
                                                    "flex h-16 w-full items-center gap-4 border-l-4 px-6 text-left text-sm font-bold uppercase transition-colors",
                                                    isActive
                                                        ? "border-red-600 bg-white text-red-600 dark:bg-gray-950"
                                                        : "border-transparent text-gray-800 hover:bg-white hover:text-red-600 dark:text-gray-200 dark:hover:bg-gray-950"
                                                )}
                                            >
                                                <BoardIcon icon={board.icon} className="h-5 w-5 shrink-0" />
                                                <span className="truncate">{board.name}</span>
                                            </button>
                                        );
                                    })
                                ) : (
                                    <div className="px-6 py-8 text-sm font-semibold text-gray-500 dark:text-gray-400">
                                        Seçili Kurul Yok
                                    </div>
                                )}
                            </div>

                            <BoardMembersPanel board={activeBoard} />
                        </div>
                    </MenuItems>
                </>
            )}
        </Menu>
    );
}

export default function Header() {
    const [menuItems, setMenuItems] = useState([]);
    const [logo, setLogo] = useState(null);
    const [windowWidth, setWindowWidth] = useState(window.innerWidth);

    useEffect(() => {
        getMenus().then((data) => {
            if (!data) return;
            const links = data.menus?.links ?? data.links ?? [];
            const normalizedLinks = links
                .filter((item) => item?.isActive)
                .sort((a, b) => Number(a.order ?? 0) - Number(b.order ?? 0));
            setMenuItems(normalizedLinks);
        });

        getLogo().then((data) => {
            if (data) setLogo(data);
        });

        const handleResize = () => setWindowWidth(window.innerWidth);
        window.addEventListener("resize", handleResize);
        return () => window.removeEventListener("resize", handleResize);
    }, []);

    const classNames = (...classes) => classes.filter(Boolean).join(" ");

    const isTopLevelMenu = (item) => {
        const parentId = Number(item?.parentId ?? 0);
        return parentId <= 0;
    };
    const getMenuHref = (item) => item?.url ?? "#";
    const isBoardsMenu = (item) => item?.menuType === "boards";

    const parentMenus = menuItems
        .filter((item) => isTopLevelMenu(item))
        .sort((a, b) => Number(a.order ?? 0) - Number(b.order ?? 0));

    const getSubMenus = (parentId) =>
        menuItems
            .filter((i) => Number(i.parentId ?? 0) === Number(parentId))
            .sort(
                (a, b) =>
                    Number(a["child-order"] ?? a["childOrder"] ?? a.order ?? 0) -
                    Number(b["child-order"] ?? b["childOrder"] ?? b.order ?? 0)
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
                                <div className="hidden lg:flex ml-auto items-center justify-end gap-0.5 xl:gap-1 flex-wrap min-w-0 max-w-full overflow-visible">
                                    {parentMenus.map((parent) => {
                                        if (isBoardsMenu(parent)) {
                                            return (
                                                <BoardsMegaMenu
                                                    key={parent.slug ?? parent.id}
                                                    parent={parent}
                                                    classNames={classNames}
                                                />
                                            );
                                        }

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
                                                                            key={sub.slug ?? sub.url ?? sub.id}
                                                                        >
                                                                            <a
                                                                                href={getMenuHref(sub)}
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
                                                key={parent.slug ?? parent.url ?? parent.id}
                                                href={getMenuHref(parent)}
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
                                    if (isBoardsMenu(parent)) {
                                        const boards = Array.isArray(parent.boards) ? parent.boards : [];

                                        return (
                                            <Disclosure
                                                key={parent.slug ?? parent.id}
                                                as="div"
                                            >
                                                {({ open: subOpen }) => (
                                                    <>
                                                        <DisclosureButton className="flex w-full justify-between items-center rounded-md px-5 py-4 text-lg font-semibold text-gray-800 transition-colors duration-150 hover:bg-gray-200 dark:text-gray-200 dark:hover:bg-gray-800">
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
                                                        <DisclosurePanel className="mt-1 space-y-3 px-3 pb-4">
                                                            {boards.length > 0 ? (
                                                                boards.map((board) => {
                                                                    const members = Array.isArray(board.members) ? board.members : [];

                                                                    return (
                                                                        <div
                                                                            key={board.id}
                                                                            className="rounded-lg border border-gray-200 bg-white p-4 dark:border-gray-700 dark:bg-gray-950"
                                                                        >
                                                                            <div className="flex items-center gap-3">
                                                                                <div className="flex h-11 w-11 shrink-0 items-center justify-center rounded-md bg-red-600 text-white">
                                                                                    <BoardIcon icon={board.icon} className="h-6 w-6" />
                                                                                </div>
                                                                                <div className="min-w-0">
                                                                                    <p className="truncate font-bold text-gray-950 dark:text-white">
                                                                                        {board.name}
                                                                                    </p>
                                                                                    <p className="text-sm font-medium text-gray-500 dark:text-gray-400">
                                                                                        {members.length} üye
                                                                                    </p>
                                                                                </div>
                                                                            </div>

                                                                            {members.length > 0 ? (
                                                                                <div className="mt-4 space-y-2">
                                                                                    {members.map((member, index) => (
                                                                                        <div
                                                                                            key={`${member.name ?? "member"}-${index}`}
                                                                                            className="rounded-md bg-gray-50 px-3 py-2 dark:bg-gray-900"
                                                                                        >
                                                                                            <p className="font-semibold text-gray-900 dark:text-white">
                                                                                                {member.name}
                                                                                            </p>
                                                                                            {member.title ? (
                                                                                                <p className="text-sm text-gray-600 dark:text-gray-300">
                                                                                                    {member.title}
                                                                                                </p>
                                                                                            ) : null}
                                                                                        </div>
                                                                                    ))}
                                                                                </div>
                                                                            ) : null}
                                                                        </div>
                                                                    );
                                                                })
                                                            ) : (
                                                                <p className="px-2 py-3 text-sm font-semibold text-gray-500 dark:text-gray-400">
                                                                    Seçili Kurul Yok
                                                                </p>
                                                            )}
                                                        </DisclosurePanel>
                                                    </>
                                                )}
                                            </Disclosure>
                                        );
                                    }

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
                                                                        key={sub.slug ?? sub.url ?? sub.id}
                                                                        href={getMenuHref(sub)}
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
                                            key={parent.slug ?? parent.url ?? parent.id}
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
