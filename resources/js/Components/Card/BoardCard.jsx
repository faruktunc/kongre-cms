import React, { useState } from "react";
import {
    Users, Star, BookOpen, Award, Lightbulb, Globe, Briefcase,
    Mic, GraduationCap, Handshake, Zap, Heart, Target, Trophy,
    FlaskConical, Network, BarChart, Calendar, MessageCircle, Rocket,
    ChevronDown, ChevronUp,
} from "lucide-react";

const iconMap = {
    Users, Star, BookOpen, Award, Lightbulb, Globe, Briefcase,
    Mic, GraduationCap, Handshake, Zap, Heart, Target, Trophy,
    FlaskConical, Network, BarChart, Calendar, MessageCircle, Rocket,
};

export default function BoardCard({ committee, index }) {
    const [isExpanded, setIsExpanded] = useState(true);
    const Icon = iconMap[committee.icon] ?? Users;

    return (
        <div
            className="group relative"
            style={{ animation: `slideUp 0.6s ease-out ${index * 0.15}s both` }}
        >
            <div className="relative bg-white dark:bg-gray-800 rounded-2xl overflow-hidden border border-gray-200 dark:border-gray-700 transition-all duration-500 hover:shadow-2xl">
                <div
                    className="relative p-6 cursor-pointer bg-gradient-to-br from-gray-50 to-white dark:from-gray-800 dark:to-gray-900 border-b border-gray-200 dark:border-gray-700"
                    onClick={() => setIsExpanded(!isExpanded)}
                >
                    <div className="flex items-center gap-4">
                        <div className="w-14 h-14 bg-gradient-to-br from-red-500 to-red-600 dark:from-red-600 dark:to-red-700 rounded-xl flex items-center justify-center shadow-lg">
                            <Icon className="w-7 h-7 text-white" />
                        </div>
                        <div>
                            <h3 className="text-xl font-bold text-gray-900 dark:text-white mb-1">
                                {committee.name}
                            </h3>
                            {committee.members && (
                                <p className="text-sm text-gray-500 dark:text-gray-400">
                                    {committee.members.length} Üye
                                </p>
                            )}
                        </div>
                        <div className="ml-auto flex items-center gap-3">
                            <div className="w-10 h-10 bg-gray-100 dark:bg-gray-700 rounded-lg flex items-center justify-center">
                                {isExpanded ? (
                                    <ChevronUp className="w-5 h-5 text-gray-600 dark:text-gray-300" />
                                ) : (
                                    <ChevronDown className="w-5 h-5 text-gray-600 dark:text-gray-300" />
                                )}
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    className={`transition-all duration-500 overflow-hidden ${
                        isExpanded ? "max-h-[1000px] opacity-100" : "max-h-0 opacity-0"
                    }`}
                >
                    {committee.members && (
                        <div className="p-6 grid grid-cols-1 gap-3 bg-gray-50 dark:bg-gray-900 rounded-b-xl">
                            {committee.members.map((m, idx) => (
                                <div
                                    key={idx}
                                    className="bg-white dark:bg-gray-800 rounded-xl p-4 border border-gray-200 dark:border-gray-700"
                                >
                                    <h4 className="font-bold text-gray-900 dark:text-white">
                                        {m.name}
                                    </h4>
                                    <p className="text-gray-600 dark:text-gray-400">
                                        {m.title}
                                    </p>
                                </div>
                            ))}
                        </div>
                    )}
                </div>
            </div>
        </div>
    );
}
