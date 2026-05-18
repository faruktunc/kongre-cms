import React, { useEffect, useState } from "react";
import { getEvents } from "../../Services/apiClientServices";
import {
    Calendar,
    ChevronLeft,
    ChevronRight,
} from "react-feather";

export default function SliderSection() {
    const [event, setEvent] = useState(null);
    const [currentSlide, setCurrentSlide] = useState(0);
    const [timeLeft, setTimeLeft] = useState({
        days: 0,
        hours: 0,
        minutes: 0,
        seconds: 0,
    });
    const normalize = (str) =>
        str
            .replace(/İ/g, "i")
            .replace(/I/g, "i")
            .replace(/Ğ/g, "g")
            .replace(/Ü/g, "u")
            .replace(/Ş/g, "s")
            .replace(/Ö/g, "o")
            .replace(/Ç/g, "c")
            .toLowerCase();

    useEffect(() => {
        getEvents().then((data) => {
            if (data) {
                setEvent(data);
            }
        });
    }, []);

    useEffect(() => {
        if (!event || !event.images || event.images.length === 0) return;

        const slideTimer = setInterval(() => {
            setCurrentSlide((prev) => (prev + 1) % event.images.length);
        }, 5000); 

        return () => clearInterval(slideTimer);
    }, [event]);

    useEffect(() => {
        if (!event?.date) {
            return;
        }

        const calculateTimeLeft = () => {
            const now = new Date();
            const targetDate = new Date(`${event.date}T00:00:00`);
            const difference = targetDate.getTime() - now.getTime();

            if (difference <= 0) {
                setTimeLeft({ days: 0, hours: 0, minutes: 0, seconds: 0 });
                return;
            }

            setTimeLeft({
                days: Math.floor(difference / (1000 * 60 * 60 * 24)),
                hours: Math.floor((difference / (1000 * 60 * 60)) % 24),
                minutes: Math.floor((difference / 1000 / 60) % 60),
                seconds: Math.floor((difference / 1000) % 60),
            });
        };

        calculateTimeLeft();
        const countdownTimer = setInterval(calculateTimeLeft, 1000);

        return () => clearInterval(countdownTimer);
    }, [event?.date]);

    const nextSlide = () =>
        setCurrentSlide((prev) =>
            event && event.images ? (prev + 1) % event.images.length : 0
        );

    const prevSlide = () =>
        setCurrentSlide((prev) =>
            event && event.images
                ? (prev - 1 + event.images.length) % event.images.length
                : 0
        );

    const formatDate = (startDate, endDate) => {
        const start = new Date(startDate);
        const end = new Date(endDate);
        const months = [
            "Ocak",
            "Şubat",
            "Mart",
            "Nisan",
            "Mayıs",
            "Haziran",
            "Temmuz",
            "Ağustos",
            "Eylül",
            "Ekim",
            "Kasım",
            "Aralık",
        ];
        return `${start.getDate()} - ${end.getDate()} ${
            months[end.getMonth()]
        } ${end.getFullYear()}`;
    };

    if (!event) {
        return (
            <div className="h-screen bg-gray-900 flex items-center justify-center">
                <div className="text-white text-2xl">Yükleniyor...</div>
            </div>
        );
    }

    return (
        <div id="slider" className="relative h-screen overflow-hidden">
            {event.images &&
                event.images.map((image, index) => (
                    <div
                        key={index}
                        className={`absolute inset-0 transition-opacity duration-700 ${
                            index === currentSlide ? "opacity-100" : "opacity-0"
                        }`}
                    >
                        <div className="absolute inset-0 bg-gradient-to-r from-white/20 via-white/20 to-transparent z-10" />
                        <img
                            src={image}
                            alt={`${event.title} - ${index + 1}`}
                            className="w-full h-full object-cover"
                        />
                        <div className="absolute inset-0 z-20 flex items-center">
                            <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                                <div className="max-w-3xl">
                                    <h1 className="text-5xl md:text-7xl font-extrabold text-gray-900 leading-tight">
                                        {event.title
                                            .split(" ")
                                            .map((word, i) => {
                                                const isHighlight =
                                                    event.highlight_words?.some(
                                                        (hw) =>
                                                            normalize(hw) ===
                                                            normalize(word)
                                                    );
                                                return (
                                                    <span
                                                        key={i}
                                                        className={
                                                            isHighlight
                                                                ? "text-transparent bg-clip-text bg-gradient-to-r from-red-500 to-red-600"
                                                                : ""
                                                        }
                                                    >
                                                        {word}{" "}
                                                    </span>
                                                );
                                            })}
                                    </h1>
                                    <p className="text-white font-bold text-lg text-shadow-lg/60">
                                        {event.description}
                                    </p>
                                    <div className="flex items-center space-x-6 mb-8">
                                        <div className="flex items-center text-gray-100">
                                            <Calendar className="w-5 h-5 mr-2 text-gray-700" />
                                            <span className="font-bold text-lg text-shadow-lg/60">
                                                {formatDate(
                                                    event.date,
                                                    event.end_date
                                                )}
                                            </span>
                                        </div>
                                    </div>
                                    <div className="grid grid-cols-4 gap-4 mb-8">
                                        {[
                                            {
                                                value: timeLeft.days,
                                                label: "Gün",
                                            },
                                            {
                                                value: timeLeft.hours,
                                                label: "Saat",
                                            },
                                            {
                                                value: timeLeft.minutes,
                                                label: "Dakika",
                                            },
                                            {
                                                value: timeLeft.seconds,
                                                label: "Saniye",
                                            },
                                        ].map((item, i) => (
                                            <div
                                                key={i}
                                                className="bg-gray-950/30 backdrop-blur-lg rounded-lg p-4 text-center"
                                            >
                                                <div className="text-3xl md:text-4xl font-bold text-gray-100">
                                                    {item.value}
                                                </div>
                                                <div className="text-sm text-gray-300 mt-1">
                                                    {item.label}
                                                </div>
                                            </div>
                                        ))}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                ))}
            <button
                onClick={prevSlide}
                className="absolute left-4 top-1/2 -translate-y-1/2 z-30 bg-white/20 backdrop-blur-md p-3 rounded-full hover:bg-white/30 transition-all"
            >
                <ChevronLeft className="w-6 h-6 text-white" />
            </button>

            <button
                onClick={nextSlide}
                className="absolute right-4 top-1/2 -translate-y-1/2 z-30 bg-white/20 backdrop-blur-md p-3 rounded-full hover:bg-white/30 transition-all"
            >
                <ChevronRight className="w-6 h-6 text-white" />
            </button>
            <div className="absolute bottom-8 left-1/2 -translate-x-1/2 z-30 flex space-x-3">
                {event.images?.map((_, index) => (
                    <button
                        key={index}
                        onClick={() => setCurrentSlide(index)}
                        className={`w-3 h-3 rounded-full transition-all ${
                            index === currentSlide
                                ? "bg-red-500 w-8"
                                : "bg-white/50"
                        }`}
                    />
                ))}
            </div>
        </div>
    );
}
