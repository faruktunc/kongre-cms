import React, { useEffect, useState } from "react";
import { Disclosure, DisclosureButton, DisclosurePanel } from "@headlessui/react";
import { ChevronDown, Users, Star, BookOpen, Award, Lightbulb, Globe, Briefcase, Mic, GraduationCap, Handshake, Zap, Heart, Target, Trophy, FlaskConical, Network, BarChart, Calendar, MessageCircle, Rocket } from "lucide-react";
import { getBoards } from "../../Services/apiClientServices";

const iconMap = {
    Users, Star, BookOpen, Award, Lightbulb, Globe, Briefcase,
    Mic, GraduationCap, Handshake, Zap, Heart, Target, Trophy,
    FlaskConical, Network, BarChart, Calendar, MessageCircle, Rocket,
};

function BoardIcon({ icon, className }) {
    const Icon = iconMap[icon] ?? Users;
    return <Icon className={className} />;
}

function BoardCard({ board }) {
    const members = Array.isArray(board.members) ? board.members : [];

    return (
        <a
            href={board.url}
            className="group cursor-pointer rounded-xl border border-gray-200 bg-white p-6 shadow-sm transition hover:border-red-200 hover:shadow-md dark:border-gray-700 dark:bg-gray-900 dark:hover:border-red-800"
        >
            <div className="flex items-center gap-4">
                <div className="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-red-600 text-white shadow-sm transition group-hover:bg-red-700">
                    <BoardIcon icon={board.icon} className="h-6 w-6" />
                </div>
                <div className="min-w-0">
                    <h3 className="truncate text-lg font-bold text-gray-950 dark:text-white">
                        {board.name}
                    </h3>
                    <p className="mt-0.5 text-sm font-medium text-gray-500 dark:text-gray-400">
                        {members.length} Üye
                    </p>
                </div>
            </div>
        </a>
    );
}

export default function HomeBoardsSection() {
    const [boards, setBoards] = useState([]);
    const [loading, setLoading] = useState(true);

    useEffect(() => {
        getBoards()
            .then((data) => {
                setBoards(Array.isArray(data) ? data : []);
            })
            .finally(() => setLoading(false));
    }, []);

    if (!loading && boards.length === 0) {
        return null;
    }

    return (
        <section
            id="kurullar"
            className="border-t border-gray-200 bg-gradient-to-r from-gray-50 via-gray-100 to-gray-200 py-16 dark:border-gray-700 dark:from-[#101828] dark:via-[#030712] dark:to-[#1E2939]"
        >
            <div className="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
                <Disclosure>
                    {({ open }) => (
                        <>
                            <DisclosureButton className="flex w-full items-center justify-between text-left">
                                <h2 className="text-4xl font-extrabold text-gray-950 dark:text-white">
                                    Kurullar
                                </h2>
                                <ChevronDown
                                    className={`h-8 w-8 shrink-0 text-gray-600 transition-transform duration-300 dark:text-gray-300 ${
                                        open ? "rotate-180" : ""
                                    }`}
                                />
                            </DisclosureButton>

                            <DisclosurePanel className="mt-8">
                                {loading ? (
                                    <div className="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                                        {[0, 1, 2, 3, 4, 5].map((item) => (
                                            <div
                                                key={item}
                                                className="h-24 animate-pulse rounded-xl bg-white/80 dark:bg-gray-900"
                                            />
                                        ))}
                                    </div>
                                ) : (
                                    <div className="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                                        {boards.map((board) => (
                                            <BoardCard key={board.id} board={board} />
                                        ))}
                                    </div>
                                )}
                            </DisclosurePanel>
                        </>
                    )}
                </Disclosure>
            </div>
        </section>
    );
}
