import React, { useState, useEffect } from "react";
import { Mail, Phone, MapPin, Send, Clock, Globe, Check } from "lucide-react";
import { getContact } from "../../Services/apiClientServices";

const ContactSection = () => {
    const [contactInfo, setContactInfo] = useState([]);
    const [formData, setFormData] = useState({
        name: "",
        email: "",
        subject: "",
        message: "",
    });
    const [isSubmitted, setIsSubmitted] = useState(false);

    useEffect(() => {
        getContact().then((data) => setContactInfo(data));
    }, []);

    const handleSubmit = () => {
        // TODO: Contact form submission API entegrasyonu sonraki asamada eklenecek.

        setIsSubmitted(true);
        setTimeout(() => setIsSubmitted(false), 3000);
        setFormData({ name: "", email: "", subject: "", message: "" });
    };

    const handleChange = (field, value) => {
        setFormData({
            ...formData,
            [field]: value,
        });
    };

    // Icon mapping
    const iconMap = {
        Mail: Mail,
        Phone: Phone,
        MapPin: MapPin,
        Clock: Clock,
    };

    return (
        <section className="py-20 bg-gradient-to-br from-gray-50 via-gray-100 to-gray-50 dark:bg-gradient-to-br dark:from-gray-950 dark:via-gray-900 dark:to-gray-950">
            <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                {/* Header */}
                <div className="text-center mb-16">
                    <div className="inline-flex items-center gap-2 bg-red-50 dark:bg-red-950/30 border border-red-200 dark:border-red-800 rounded-full px-6 py-2 mb-6">
                        <Globe className="w-5 h-5 text-red-600 dark:text-red-400" />
                        <span className="text-sm font-semibold text-red-600 dark:text-red-400">
                            Bizimle İletişime Geçin
                        </span>
                    </div>
                    <h2 className="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-4">
                        Sorularınız mı var?
                    </h2>
                    <p className="text-gray-600 dark:text-gray-400 text-lg max-w-2xl mx-auto">
                        Size yardımcı olmaktan mutluluk duyarız. Formu doldurun
                        veya doğrudan bize ulaşın.
                    </p>
                </div>

                <div className="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <div className="lg:col-span-1 space-y-6">
                        {contactInfo.map((info, index) => {
                           if (
                                info.title === "Akademik İletişim" &&
                                Array.isArray(info.members)
                            ) {
                                return (
                                    <div
                                        key={index}
                                        className="group relative bg-white dark:bg-gray-800 rounded-2xl p-6 border border-gray-200 dark:border-gray-700 hover:border-red-500 dark:hover:border-red-500 transition-all duration-300 hover:shadow-xl hover:shadow-red-500/10 dark:hover:shadow-red-500/20"
                                    >
                                        <div className="flex items-center gap-3 mb-4">
                                            <div className="w-10 h-10 bg-gradient-to-br from-red-500 to-red-600 dark:from-red-600 dark:to-red-700 rounded-xl flex items-center justify-center shadow-lg">
                                                <Mail className="w-5 h-5 text-white" />
                                            </div>
                                            <h3 className="text-lg font-semibold text-gray-900 dark:text-white">
                                                {info.title}
                                            </h3>
                                        </div>

                                        <div className="space-y-4">
                                            {info.members.map((person, i) => (
                                                <div
                                                    key={i}
                                                    className="bg-gray-50 dark:bg-gray-900/40 rounded-xl p-4 border border-gray-200 dark:border-gray-700 hover:border-red-500 transition-all duration-300"
                                                >
                                                    <h4 className="text-md font-semibold text-gray-900 dark:text-white">
                                                        {person.name}
                                                    </h4>
                                                    <p className="text-sm text-gray-600 dark:text-gray-400">
                                                        {person.university}
                                                    </p>
                                                    <a
                                                        href={`mailto:${person.email}`}
                                                        className="text-sm text-red-600 dark:text-red-400 hover:underline"
                                                    >
                                                        {person.email}
                                                    </a>
                                                </div>
                                            ))}
                                        </div>
                                    </div>
                                );
                            }
                            const IconComponent = iconMap[info.icon];
                            return (
                                <div
                                    key={index}
                                    className="group relative bg-white dark:bg-gray-800 rounded-2xl p-6 border border-gray-200 dark:border-gray-700 hover:border-red-500 dark:hover:border-red-500 transition-all duration-300 hover:shadow-xl hover:shadow-red-500/10 dark:hover:shadow-red-500/20"
                                    style={{
                                        animation: `slideInLeft 0.6s ease-out ${
                                            index * 0.1
                                        }s both`,
                                    }}
                                >
                                    <div className="relative z-10">
                                        <div className="flex items-start gap-4">
                                            <div className="flex-shrink-0">
                                                <div className="w-12 h-12 bg-gradient-to-br from-red-500 to-red-600 dark:from-red-600 dark:to-red-700 rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                                                    {IconComponent && (
                                                        <IconComponent className="w-6 h-6 text-white" />
                                                    )}
                                                </div>
                                            </div>
                                            <div className="flex-1 min-w-0">
                                                <h3 className="text-sm font-semibold text-gray-500 dark:text-gray-400 mb-1">
                                                    {info.title}
                                                </h3>
                                                <a
                                                    href={info.link}
                                                    className="text-gray-900 dark:text-white font-medium hover:text-red-600 dark:hover:text-red-400 transition-colors duration-200 break-words"
                                                >
                                                    {info.value}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            );
                        })}
                    </div>
                    <div className="lg:col-span-2">
                        <div
                            className="bg-white dark:bg-gray-800 rounded-2xl p-8 border border-gray-200 dark:border-gray-700 shadow-xl"
                            style={{
                                animation: "slideInRight 0.6s ease-out both",
                            }}
                        >
                            <div className="space-y-6">
                                <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label className="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                            Adınız Soyadınız
                                        </label>
                                        <input
                                            type="text"
                                            value={formData.name}
                                            onChange={(e) =>
                                                handleChange(
                                                    "name",
                                                    e.target.value
                                                )
                                            }
                                            className="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-red-500 dark:focus:ring-red-400 focus:border-transparent transition-all duration-200 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500"
                                            placeholder="Ad Soyad"
                                        />
                                    </div>
                                    <div>
                                        <label className="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                            E-posta Adresiniz
                                        </label>
                                        <input
                                            type="email"
                                            value={formData.email}
                                            onChange={(e) =>
                                                handleChange(
                                                    "email",
                                                    e.target.value
                                                )
                                            }
                                            className="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-red-500 dark:focus:ring-red-400 focus:border-transparent transition-all duration-200 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500"
                                            placeholder="email@ornek.com"
                                        />
                                    </div>
                                </div>
                                <div>
                                    <label className="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                        Konu
                                    </label>
                                    <input
                                        type="text"
                                        value={formData.subject}
                                        onChange={(e) =>
                                            handleChange(
                                                "subject",
                                                e.target.value
                                            )
                                        }
                                        className="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-red-500 dark:focus:ring-red-400 focus:border-transparent transition-all duration-200 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500"
                                        placeholder="Mesajınızın konusu"
                                    />
                                </div>
                                <div>
                                    <label className="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                        Mesajınız
                                    </label>
                                    <textarea
                                        value={formData.message}
                                        onChange={(e) =>
                                            handleChange(
                                                "message",
                                                e.target.value
                                            )
                                        }
                                        rows={6}
                                        className="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-red-500 dark:focus:ring-red-400 focus:border-transparent transition-all duration-200 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500 resize-none"
                                        placeholder="Mesajınızı buraya yazın..."
                                    />
                                </div>
                                <button
                                    onClick={handleSubmit}
                                    disabled={isSubmitted}
                                    className="w-full bg-gradient-to-r from-red-600 to-red-700 dark:from-red-500 dark:to-red-600 text-white font-semibold py-4 px-6 rounded-xl hover:shadow-xl hover:shadow-red-500/30 transition-all duration-300 hover:scale-105 active:scale-95 disabled:opacity-50 disabled:cursor-not-allowed flex items-center justify-center gap-2"
                                >
                                    {isSubmitted ? (
                                        <>
                                            <Check className="w-5 h-5" />
                                            <span>Gönderildi!</span>
                                        </>
                                    ) : (
                                        <>
                                            <Send className="w-5 h-5" />
                                            <span>Mesaj Gönder</span>
                                        </>
                                    )}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <style jsx>{`
                @keyframes slideInLeft {
                    from {
                        opacity: 0;
                        transform: translateX(-30px);
                    }
                    to {
                        opacity: 1;
                        transform: translateX(0);
                    }
                }

                @keyframes slideInRight {
                    from {
                        opacity: 0;
                        transform: translateX(30px);
                    }
                    to {
                        opacity: 1;
                        transform: translateX(0);
                    }
                }
            `}</style>
        </section>
    );
};

export default ContactSection;
