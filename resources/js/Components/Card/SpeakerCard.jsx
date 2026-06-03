import { Briefcase, X } from "lucide-react";
import React, { useEffect, useState } from "react";

function SpeakerModal({ speaker, onClose }) {
    useEffect(() => {
        const onKey = (e) => e.key === "Escape" && onClose();
        document.addEventListener("keydown", onKey);
        document.body.style.overflow = "hidden";
        return () => {
            document.removeEventListener("keydown", onKey);
            document.body.style.overflow = "";
        };
    }, [onClose]);

    return (
        <div
            className="fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-6"
            onClick={onClose}
        >
            {/* Backdrop */}
            <div className="absolute inset-0 bg-black/60 backdrop-blur-sm" />

            {/* Modal */}
            <div
                className="relative z-10 w-full max-w-3xl bg-white dark:bg-gray-900 rounded-2xl shadow-2xl overflow-hidden flex flex-col sm:flex-row"
                onClick={(e) => e.stopPropagation()}
            >
                {/* Kapat */}
                <button
                    onClick={onClose}
                    className="absolute top-4 right-4 z-20 bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm p-1.5 rounded-full text-gray-600 dark:text-gray-300 hover:text-white hover:bg-red-500 dark:hover:bg-red-600 transition-all duration-200 shadow"
                >
                    <X className="w-5 h-5" />
                </button>

                {/* Sol — Fotoğraf */}
                <div className="sm:w-64 lg:w-72 shrink-0 relative">
                    <img
                        src={speaker.photo}
                        alt={speaker.name}
                        className="w-full h-64 sm:h-full object-cover object-top"
                    />
                    <div className="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent sm:bg-gradient-to-r sm:from-transparent sm:via-transparent sm:to-black/10" />
                </div>

                {/* Sağ — İçerik */}
                <div className="flex-1 p-6 sm:p-8 flex flex-col gap-4 max-h-[70vh] overflow-y-auto">
                    {/* İsim & Unvan */}
                    <div>
                        <h2 className="text-2xl font-extrabold text-gray-950 dark:text-white leading-tight">
                            {speaker.name}
                        </h2>
                        <div className="flex items-center gap-2 mt-2">
                            <div className="w-1 h-4 bg-gradient-to-b from-gray-400 to-gray-600 dark:from-gray-300 dark:to-gray-500 rounded-full shrink-0" />
                            <p className="text-gray-600 dark:text-gray-300 font-semibold text-sm">
                                {speaker.title}
                            </p>
                        </div>
                        {speaker.company && (
                            <div className="flex items-center gap-2 mt-1.5">
                                <Briefcase className="w-4 h-4 text-gray-400 shrink-0" />
                                <span className="text-sm text-gray-500 dark:text-gray-400">
                                    {speaker.company}
                                </span>
                            </div>
                        )}
                    </div>

                    {/* Ayırıcı */}
                    <div className="h-px bg-gradient-to-r from-gray-200 via-gray-300 to-transparent dark:from-gray-700 dark:via-gray-600" />

                    {/* Biyografi */}
                    {speaker.bio && (
                        <p className="text-gray-600 dark:text-gray-300 text-sm leading-relaxed">
                            {speaker.bio}
                        </p>
                    )}

                    {/* Uzmanlık */}
                    {speaker.expertise?.length > 0 && (
                        <div className="flex flex-wrap gap-2 mt-auto pt-2">
                            {speaker.expertise.map((exp, i) => (
                                <span
                                    key={i}
                                    className="text-xs font-medium bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 px-3 py-1.5 rounded-lg border border-gray-200 dark:border-gray-700"
                                >
                                    {exp}
                                </span>
                            ))}
                        </div>
                    )}
                </div>
            </div>
        </div>
    );
}

export const SpeakerCard = ({ speaker, index }) => {
    const [open, setOpen] = useState(false);

    return (
        <>
            <div
                className="group relative cursor-pointer"
                style={{ animation: `slideUp 0.6s ease-out ${index * 0.15}s both` }}
                onClick={() => setOpen(true)}
            >
                {/* Hover glow */}
                <div className="absolute -inset-1 bg-gradient-to-r from-gray-400 via-gray-200 to-gray-300 dark:from-gray-500 dark:via-gray-200 dark:to-gray-300 rounded-2xl opacity-0 group-hover:opacity-30 blur-xl transition-all duration-500" />

                {/* Kart gövdesi */}
                <div className="relative bg-gradient-to-br from-white via-gray-100 to-gray-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 rounded-2xl overflow-hidden border border-gray-200 dark:border-gray-700/50 group-hover:border-gray-400 dark:group-hover:border-gray-400 transition-all duration-500 hover:shadow-2xl hover:shadow-gray-400/10 dark:hover:shadow-gray-100/20">
                    {/* Grid dokusu */}
                    <div className="absolute inset-0 opacity-10">
                        <div
                            className="absolute inset-0 transition-transform duration-1000 group-hover:scale-110"
                            style={{
                                backgroundImage: "radial-gradient(circle at 2px 2px, rgba(156, 163, 175, 0.3) 1px, transparent 0)",
                                backgroundSize: "40px 40px",
                            }}
                        />
                    </div>

                    {/* Üst ince şerit */}
                    <div className="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-transparent via-gray-400 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500" />

                    {/* Görsel */}
                    <div className="relative h-72 overflow-hidden">
                        <div className="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-gray-900/60 dark:to-gray-900 z-10" />
                        <img
                            src={speaker.photo}
                            alt={speaker.name}
                            className="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                        />
                        <div className="absolute bottom-4 left-4 z-20 bg-white/60 dark:bg-black/50 backdrop-blur-md px-4 py-2 rounded-full border border-gray-200/40 dark:border-white/10">
                            <div className="flex items-center gap-2">
                                <Briefcase className="w-4 h-4 text-gray-700 dark:text-gray-300" />
                                <span className="text-sm font-medium text-gray-800 dark:text-white">
                                    {speaker.company}
                                </span>
                            </div>
                        </div>
                    </div>

                    {/* Metin */}
                    <div className="relative p-6 space-y-4">
                        <div>
                            <h3 className="text-2xl font-bold text-gray-900 dark:text-white mb-2 group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r group-hover:from-gray-600 group-hover:to-gray-900 dark:group-hover:from-gray-200 dark:group-hover:to-gray-300 transition-all duration-300">
                                {speaker.name}
                            </h3>
                            <div className="flex items-center gap-2 mb-3">
                                <div className="w-1 h-4 bg-gradient-to-b from-gray-400 to-gray-600 dark:from-gray-300 dark:to-gray-500 rounded-full" />
                                <p className="text-gray-700 dark:text-gray-300 font-semibold text-sm">
                                    {speaker.title}
                                </p>
                            </div>
                        </div>

                        <p className="text-gray-600 dark:text-gray-400 text-sm leading-relaxed line-clamp-2">
                            {speaker.bio}
                        </p>

                        <div className="flex flex-wrap gap-2">
                            {speaker.expertise.map((exp, i) => (
                                <span key={i} className="relative group/tag">
                                    <span className="relative z-10 inline-block text-xs font-medium bg-gradient-to-r from-gray-100 to-gray-50 dark:from-gray-800 dark:to-gray-700 text-gray-700 dark:text-gray-300 px-3 py-1.5 rounded-lg border border-gray-200/70 dark:border-gray-600/50 group-hover/tag:border-gray-800 dark:group-hover/tag:border-gray-800 transition-all duration-300 group-hover/tag:text-black dark:group-hover/tag:text-white">
                                        {exp}
                                    </span>
                                    <span className="absolute inset-0 bg-gradient-to-r from-gray-300 to-gray-400 dark:from-gray-200 dark:to-gray-300 rounded-lg opacity-0 group-hover/tag:opacity-100 transition-opacity duration-300" />
                                </span>
                            ))}
                        </div>
                    </div>

                    {/* Alt köşe süs */}
                    <div className="absolute bottom-0 right-0 w-24 h-24 bg-gradient-to-tl from-gray-300 to-transparent dark:from-gray-700 dark:to-transparent rounded-tl-full transform translate-x-12 translate-y-12 group-hover:translate-x-8 group-hover:translate-y-8 transition-transform duration-500" />
                </div>

                <style jsx>{`
                    @keyframes slideUp {
                        from { opacity: 0; transform: translateY(30px); }
                        to   { opacity: 1; transform: translateY(0); }
                    }
                `}</style>
            </div>

            {open && <SpeakerModal speaker={speaker} onClose={() => setOpen(false)} />}
        </>
    );
};
