import React, { useEffect, useMemo, useState } from "react";
import ProgramSection from "../Home/ProgramSection";
import { getSessions } from "../../Services/apiClientServices";

export default function CongreTakvimiSection() {
    const [sessions, setSessions] = useState([]);

    useEffect(() => {
        getSessions().then((data) => setSessions(Array.isArray(data) ? data : []));
    }, []);

    const sortedSessions = useMemo(() => {
        return [...sessions].sort((a, b) => {
            const aDate = `${a.date ?? ""} ${a.start_time ?? ""}`;
            const bDate = `${b.date ?? ""} ${b.start_time ?? ""}`;

            return aDate.localeCompare(bDate);
        });
    }, [sessions]);

    const formatDate = (date) => {
        if (!date) {
            return "";
        }

        const dateObject = new Date(date);

        if (Number.isNaN(dateObject.getTime())) {
            return date;
        }

        const day = String(dateObject.getDate()).padStart(2, "0");
        const month = String(dateObject.getMonth() + 1).padStart(2, "0");
        const year = dateObject.getFullYear();

        return `${day}/${month}/${year}`;
    };

    return (
        <>
            <ProgramSection />

            <section className="pb-24 bg-gradient-to-r from-gray-50 via-gray-100 to-gray-200 dark:bg-gradient-to-r dark:from-[#101828] dark:via-[#030712] dark:to-[#1E2939]">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div className="text-center mb-8">
                        <h2 className="text-3xl md:text-4xl font-bold text-gray-800 dark:text-gray-100 mb-2">
                            Tüm Kongre Takvimi
                        </h2>
                        <p className="text-gray-500">Tüm oturumları tek tabloda inceleyin</p>
                    </div>

                    <div className="overflow-x-auto rounded-2xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 shadow">
                        <table className="min-w-full text-sm">
                            <thead className="bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-200">
                                <tr>
                                    <th className="px-4 py-3 text-left">Tarih</th>
                                    <th className="px-4 py-3 text-left">Saat</th>
                                    <th className="px-4 py-3 text-left">Oturum</th>
                                    <th className="px-4 py-3 text-left">Konuşmacılar</th>
                                </tr>
                            </thead>
                            <tbody>
                                {sortedSessions.map((session) => (
                                    <tr key={session.id} className="border-t border-gray-100 dark:border-gray-800">
                                        <td className="px-4 py-3 text-gray-700 dark:text-gray-300">
                                            {formatDate(session.date)}
                                        </td>
                                        <td className="px-4 py-3 text-gray-700 dark:text-gray-300">
                                            {session.start_time} - {session.end_time}
                                        </td>
                                        <td className="px-4 py-3 font-semibold text-gray-900 dark:text-gray-100">{session.title}</td>
                                        <td className="px-4 py-3 text-gray-700 dark:text-gray-300">
                                            {(session.speakers ?? []).map((speaker) => speaker.name).join(", ")}
                                        </td>
                                    </tr>
                                ))}
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </>
    );
}
