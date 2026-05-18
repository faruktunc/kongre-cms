import React, { useEffect, useState } from "react";
import { getAboutConference } from "../../Services/apiClientServices";
import {
    Users, Star, BookOpen, Award, Lightbulb, Globe, Briefcase,
    Mic, GraduationCap, Handshake, Zap, Heart, Target, Trophy,
    FlaskConical, Network, BarChart, Calendar, MessageCircle, Rocket,
} from "lucide-react";

const iconMap = {
    Users, Star, BookOpen, Award, Lightbulb, Globe, Briefcase,
    Mic, GraduationCap, Handshake, Zap, Heart, Target, Trophy,
    FlaskConical, Network, BarChart, Calendar, MessageCircle, Rocket,
};

const AboutConference = () => {
    const [conferenceInfo, setConferenceInfo] = useState(null);

    useEffect(() => {
        getAboutConference().then((data) => setConferenceInfo(data));
    }, []);

    if (!conferenceInfo) return null;

    return (
        <section className="py-40 dark:bg-[#101828] dark:bg-gradient-to-r dark:from-[#101828] dark:via-[#030712] dark:to-[#1E2939] bg-gradient-to-r from-gray-50 via-gray-100 to-gray-200">
            <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col items-center text-center gap-6">
                <div className="space-y-4">
                    <h2 className="text-4xl md:text-5xl font-bold text-gray-900 dark:text-gray-100">
                        {conferenceInfo.title}
                    </h2>
                    <p className="text-xl text-gray-600 dark:text-gray-400">{conferenceInfo.subtitle}</p>
                    <p className="mt-2 text-gray-700 dark:text-gray-300 max-w-3xl mx-auto">{conferenceInfo.overview}</p>
                </div>

                <div className="mt-12 grid grid-cols-1 md:grid-cols-3 gap-8 w-full max-w-5xl">
                    {(conferenceInfo.highlights ?? []).map((highlight, index) => {
                        const IconComponent = iconMap[highlight.icon] ?? Star;
                        const color = highlight.color || "#6366f1";
                        return (
                            <div
                                key={index}
                                className="flex flex-col items-center bg-white dark:bg-gray-800 rounded-3xl shadow-lg p-6 border border-gray-200 dark:border-gray-700 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300"
                            >
                                <div
                                    className="flex items-center justify-center w-16 h-16 rounded-full mb-4"
                                    style={{ background: `linear-gradient(to bottom right, ${color}99, ${color})` }}
                                >
                                    <IconComponent className="w-8 h-8 text-white" />
                                </div>
                                <h3 className="text-lg font-semibold text-gray-900 dark:text-white mb-2 text-center">
                                    {highlight.title}
                                </h3>
                                <p className="text-gray-700 dark:text-gray-300 text-sm text-center">
                                    {highlight.description}
                                </p>
                            </div>
                        );
                    })}
                </div>
            </div>
        </section>
    );
};

export default AboutConference;
