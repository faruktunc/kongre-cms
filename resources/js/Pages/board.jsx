import React, { useEffect, useState } from "react";
import {
    ArrowLeft,
    Award, BarChart, BookOpen, Briefcase, Calendar,
    FlaskConical, Globe, GraduationCap, Handshake, Heart,
    Lightbulb, MessageCircle, Mic, Network, Rocket,
    Star, Target, Trophy, Users, Zap,
} from "lucide-react";
import MainLayout from "../Layout/main";
import { getBoard } from "../Services/apiClientServices";

const iconMap = {
    Users, Star, BookOpen, Award, Lightbulb, Globe, Briefcase,
    Mic, GraduationCap, Handshake, Zap, Heart, Target, Trophy,
    FlaskConical, Network, BarChart, Calendar, MessageCircle, Rocket,
};

function BoardIcon({ icon, className }) {
    const Icon = iconMap[icon] ?? Users;
    return <Icon className={className} />;
}

export default function BoardDetail({ boardSlug }) {
    const [board, setBoard] = useState(null);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState(null);

    useEffect(() => {
        getBoard(boardSlug)
            .then((data) => {
                setBoard(data);
                setError(null);
            })
            .catch(() => {
                setError("Kurul bulunamadı");
            })
            .finally(() => setLoading(false));
    }, [boardSlug]);

    if (loading) {
        return (
            <MainLayout>
                <div className="flex min-h-screen items-center justify-center bg-gradient-to-r from-gray-50 via-gray-100 to-gray-200 dark:from-[#101828] dark:via-[#030712] dark:to-[#1E2939]">
                    <div className="h-12 w-12 animate-spin rounded-full border-b-2 border-red-600" />
                </div>
            </MainLayout>
        );
    }

    if (error || !board) {
        return (
            <MainLayout>
                <div className="flex min-h-screen items-center justify-center bg-gradient-to-r from-gray-50 via-gray-100 to-gray-200 dark:from-[#101828] dark:via-[#030712] dark:to-[#1E2939]">
                    <div className="text-center">
                        <p className="mb-4 text-lg text-red-600 dark:text-red-400">
                            {error || "Kurul bulunamadı"}
                        </p>
                        <a
                            href="/#kurullar"
                            className="font-semibold text-blue-600 hover:underline dark:text-blue-400"
                        >
                            Kurullara dön
                        </a>
                    </div>
                </div>
            </MainLayout>
        );
    }

    const members = Array.isArray(board.members) ? board.members : [];

    return (
        <MainLayout>
            <main className="min-h-screen bg-gradient-to-r from-gray-50 via-gray-100 to-gray-200 py-12 dark:from-[#101828] dark:via-[#030712] dark:to-[#1E2939]">
                <div className="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
                    <a
                        href="/#kurullar"
                        className="mb-8 inline-flex items-center gap-2 rounded-md bg-white px-4 py-2 text-sm font-bold text-gray-700 shadow-sm transition hover:text-red-700 dark:bg-gray-900 dark:text-gray-200 dark:hover:text-red-300"
                    >
                        <ArrowLeft className="h-4 w-4" />
                        Kurullar
                    </a>

                    <div className="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-900 sm:p-8">
                        <div className="flex items-center gap-5">
                            <div className="flex h-16 w-16 shrink-0 items-center justify-center rounded-xl bg-red-600 text-white shadow-md">
                                <BoardIcon icon={board.icon} className="h-9 w-9" />
                            </div>
                            <div>
                                <h1 className="text-3xl font-extrabold text-gray-950 dark:text-white sm:text-4xl">
                                    {board.name}
                                </h1>
                                {/*<p className="mt-1 text-sm font-semibold text-gray-500 dark:text-gray-400">*/}
                                {/*    {members.length} Üye*/}
                                {/*</p>*/}
                            </div>
                        </div>
                    </div>

                    {members.length > 0 ? (
                        <section className="mt-8">
                            {/*<h2 className="mb-4 text-2xl font-bold text-gray-950 dark:text-white">*/}
                            {/*    Üyeler*/}
                            {/*</h2>*/}
                            <div className="flex flex-col gap-3">
                                {members.map((member, index) => (
                                    <div
                                        key={`${member.name ?? "member"}-${index}`}
                                        className="rounded-2xl border-l-4 border-red-600 bg-gradient-to-br from-red-50/60 to-white px-5 py-4 shadow-sm dark:from-red-950/20 dark:to-gray-900"
                                        style={{ boxShadow: "0 2px 12px rgba(0,0,0,0.07)" }}
                                    >
                                        <p className="font-bold text-red-700 dark:text-red-400">
                                            {member.name}
                                        </p>
                                        {member.title ? (
                                            <p className="mt-1 text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                                                {member.title}
                                            </p>
                                        ) : null}
                                    </div>
                                ))}
                            </div>
                        </section>
                    ) : (
                        <div className="mt-8 rounded-lg border border-dashed border-gray-300 bg-white px-6 py-10 text-center dark:border-gray-700 dark:bg-gray-900">
                            <p className="text-sm font-semibold text-gray-500 dark:text-gray-400">
                                Bu kurul için henüz üye girilmemiş
                            </p>
                        </div>
                    )}
                </div>
            </main>
        </MainLayout>
    );
}
