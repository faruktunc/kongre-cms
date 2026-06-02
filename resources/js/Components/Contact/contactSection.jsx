import React, { useState, useEffect, useRef } from "react";
import { Mail, Phone, MapPin, Send, Clock, Globe, Check } from "lucide-react";
import { getContact, submitContactMessage } from "../../Services/apiClientServices";

const TURNSTILE_SCRIPT_ID = "cloudflare-turnstile-script";
const TURNSTILE_SCRIPT_SRC =
    "https://challenges.cloudflare.com/turnstile/v0/api.js?render=explicit";

const loadTurnstileScript = () => {
    if (window.turnstile) {
        return Promise.resolve();
    }

    const existingScript = document.getElementById(TURNSTILE_SCRIPT_ID);

    if (existingScript) {
        return new Promise((resolve, reject) => {
            existingScript.addEventListener("load", resolve, { once: true });
            existingScript.addEventListener("error", reject, { once: true });
        });
    }

    return new Promise((resolve, reject) => {
        const script = document.createElement("script");
        script.id = TURNSTILE_SCRIPT_ID;
        script.src = TURNSTILE_SCRIPT_SRC;
        script.async = true;
        script.defer = true;
        script.addEventListener("load", resolve, { once: true });
        script.addEventListener("error", reject, { once: true });

        document.head.appendChild(script);
    });
};

const ContactSection = () => {
    const [contactInfo, setContactInfo] = useState([]);
    const [turnstileSiteKey, setTurnstileSiteKey] = useState("");
    const [turnstileToken, setTurnstileToken] = useState("");
    const turnstileRef = useRef(null);
    const turnstileWidgetId = useRef(null);
    const [formData, setFormData] = useState({
        name: "",
        email: "",
        subject: "",
        message: "",
        website: "",
        form_started_at: Math.floor(Date.now() / 1000),
    });
    const [isSubmitted, setIsSubmitted] = useState(false);
    const [isSubmitting, setIsSubmitting] = useState(false);
    const [submitError, setSubmitError] = useState("");

    useEffect(() => {
        getContact().then((data) => {
            setContactInfo(Array.isArray(data) ? data : data?.items ?? []);
            setTurnstileSiteKey(data?.turnstileSiteKey ?? "");
        });
    }, []);

    useEffect(() => {
        if (!turnstileSiteKey || !turnstileRef.current) {
            return undefined;
        }

        let isMounted = true;

        loadTurnstileScript()
            .then(() => {
                if (
                    !isMounted ||
                    !window.turnstile ||
                    !turnstileRef.current ||
                    turnstileWidgetId.current !== null
                ) {
                    return;
                }

                turnstileWidgetId.current = window.turnstile.render(
                    turnstileRef.current,
                    {
                        sitekey: turnstileSiteKey,
                        theme: "auto",
                        callback: (token) => {
                            setTurnstileToken(token);
                            setSubmitError("");
                        },
                        "expired-callback": () => setTurnstileToken(""),
                        "timeout-callback": () => setTurnstileToken(""),
                        "error-callback": () => {
                            setTurnstileToken("");
                            setSubmitError(
                                "Güvenlik doğrulaması başarısız oldu. Lütfen tekrar deneyin."
                            );
                        },
                    }
                );
            })
            .catch(() => {
                if (isMounted) {
                    setSubmitError(
                        "Güvenlik doğrulaması yüklenemedi. Lütfen tekrar deneyin."
                    );
                }
            });

        return () => {
            isMounted = false;
        };
    }, [turnstileSiteKey]);

    const resetTurnstile = () => {
        setTurnstileToken("");

        if (window.turnstile && turnstileWidgetId.current !== null) {
            window.turnstile.reset(turnstileWidgetId.current);
        }
    };

    const handleSubmit = async () => {
        if (isSubmitting) {
            return;
        }

        if (!turnstileSiteKey) {
            setSubmitError("Güvenlik doğrulaması yapılandırılmamış.");
            return;
        }

        if (!turnstileToken) {
            setSubmitError("Lütfen güvenlik doğrulamasını tamamlayın.");
            return;
        }

        setSubmitError("");
        setIsSubmitting(true);

        try {
            await submitContactMessage({
                ...formData,
                "cf-turnstile-response": turnstileToken,
            });
            setIsSubmitted(true);
            setTimeout(() => setIsSubmitted(false), 3000);
            setFormData({
                name: "",
                email: "",
                subject: "",
                message: "",
                website: "",
                form_started_at: Math.floor(Date.now() / 1000),
            });
            resetTurnstile();
        } catch (error) {
            const firstValidationError = Object.values(
                error?.response?.data?.errors ?? {}
            )?.[0]?.[0];
            const backendMessage = error?.response?.data?.message;
            setSubmitError(
                typeof firstValidationError === "string" &&
                    firstValidationError.length > 0
                    ? firstValidationError
                    : typeof backendMessage === "string" &&
                        backendMessage.length > 0
                      ? backendMessage
                    : "Mesaj gönderilemedi. Lütfen tekrar deneyin."
            );
            resetTurnstile();
        } finally {
            setIsSubmitting(false);
        }
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
                                                {info.link ? (
                                                    <a
                                                        href={info.link}
                                                        className="text-gray-900 dark:text-white font-medium hover:text-red-600 dark:hover:text-red-400 transition-colors duration-200 break-words"
                                                    >
                                                        {info.value}
                                                    </a>
                                                ) : (
                                                    <p className="text-gray-900 dark:text-white font-medium break-words">
                                                        {info.value}
                                                    </p>
                                                )}
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
                                    <div className="hidden" aria-hidden="true">
                                        <label htmlFor="website">Website</label>
                                        <input
                                            id="website"
                                            type="text"
                                            tabIndex={-1}
                                            autoComplete="off"
                                            value={formData.website}
                                            onChange={(e) =>
                                                handleChange(
                                                    "website",
                                                    e.target.value
                                                )
                                            }
                                        />
                                    </div>
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
                                <div className="rounded-xl border border-gray-200 bg-gray-50 p-4 dark:border-gray-700 dark:bg-gray-900">
                                    {turnstileSiteKey ? (
                                        <div ref={turnstileRef} />
                                    ) : (
                                        <p className="text-sm text-red-600 dark:text-red-400">
                                            Güvenlik doğrulaması yapılandırılmamış.
                                        </p>
                                    )}
                                </div>
                                <button
                                    onClick={handleSubmit}
                                    disabled={isSubmitted || isSubmitting}
                                    className="w-full bg-gradient-to-r from-red-600 to-red-700 dark:from-red-500 dark:to-red-600 text-white font-semibold py-4 px-6 rounded-xl hover:shadow-xl hover:shadow-red-500/30 transition-all duration-300 hover:scale-105 active:scale-95 disabled:opacity-50 disabled:cursor-not-allowed flex items-center justify-center gap-2"
                                >
                                    {isSubmitted ? (
                                        <>
                                            <Check className="w-5 h-5" />
                                            <span>Gönderildi!</span>
                                        </>
                                    ) : isSubmitting ? (
                                        <>
                                            <Send className="w-5 h-5" />
                                            <span>Gönderiliyor...</span>
                                        </>
                                    ) : (
                                        <>
                                            <Send className="w-5 h-5" />
                                            <span>Mesaj Gönder</span>
                                        </>
                                    )}
                                </button>
                                {submitError && (
                                    <p className="text-sm text-red-600 dark:text-red-400">
                                        {submitError}
                                    </p>
                                )}
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
