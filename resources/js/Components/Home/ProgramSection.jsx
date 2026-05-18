import React, { useEffect, useState } from "react";
import { getSessions } from "../../Services/apiClientServices";
import { Clock } from "lucide-react";

const ProgramSection = () => {
  const [sessions, setSessions] = useState([]);
  const [selectedDate, setSelectedDate] = useState(null);

 useEffect(() => {
    const fetchData = async () => {
      try {
        const sessionsData = await getSessions();

        setSessions(sessionsData || []);
        if (sessionsData?.length > 0) {
          const uniqueDates = [...new Set(sessionsData.map(s => s.date))].sort();
          setSelectedDate(uniqueDates[0]);
        }
      } catch (error) {
        console.error('Error fetching data:', error);
      }
    };
    
    fetchData();
  }, []);

  const uniqueDates = [...new Set(sessions.map(s => s.date))].sort();
  const filteredSessions = selectedDate
    ? sessions.filter(s => s.date === selectedDate)
    : [];

  const formatDate = (dateStr) => {
    const date = new Date(dateStr);
    const days = ['Pazar', 'Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 'Cuma', 'Cumartesi'];
    const months = ['Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'];
    return `${date.getDate()} ${months[date.getMonth()]} ${date.getFullYear()}, ${days[date.getDay()]}`;
  };

  return (
    <section id="program" className="py-40  dark:bg-[#101828] dark:bg-gradient-to-r dark:from-[#101828] dark:via-[#030712] dark:to-[#1E2939] bg-gradient-to-r from-gray-50 via-gray-100 to-gray-200">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="text-center mb-12">
          <h2 className="text-4xl md:text-5xl font-bold text-gray-800 dark:text-gray-100 mb-4">
            Etkinlik Programı
          </h2>
          <p className="text-xl text-gray-500">Gün seçerek oturumları görüntüleyin</p>
        </div>

        <div className="flex justify-center mb-12 flex-wrap gap-4">
          {uniqueDates.map((date, index) => (
            <button
              key={date}
              onClick={() => setSelectedDate(date)}
              className={`px-6 py-3 rounded-full font-semibold transition-all ${
                selectedDate === date
                  ? 'scale-105'
                  : ''
              } bg-gray-200 dark:bg-gray-900 dark:text-gray-200  text-gray-800 hover:scale-105 drop-shadow-xl/25`}
            >
              {index + 1}. Gün - {formatDate(date)}
            </button>
          ))}
        </div>

        <div className="space-y-6">
          {filteredSessions.map((session) => {
            const sessionSpeakers = Array.isArray(session.speakers) ? session.speakers : [];

            return (
              <div
                key={session.id}
                className="bg-gradient-to-bl from-gray-50 to-gray-100 dark:bg-gradient-to-bl dark:from-gray-900 dark:to-gray-950 dark:shadow-white/2  rounded-2xl p-6 drop-shadow-xl/25  transition-all"
              >
                <div className="flex flex-col md:flex-row md:items-start gap-6">
                  <div className="flex-shrink-0">
                    <div className="bg-gray-100 dark:bg-gray-900 rounded-lg p-4 text-center min-w-[100px]">
                      <Clock className="w-6 h-6 text-gray-800 dark:text-gray-200 mx-auto mb-2" />
                      <div className="text-gray-700 dark:text-gray-300 font-bold">{session.start_time}</div>
                      <div className="text-gray-400 dark:text-gray-400 text-sm">{session.end_time}</div>
                    </div>
                  </div>

                  <div className="flex-grow">
                    <h3 className="text-2xl font-bold text-gray-900 dark:text-gray-200 mb-2">{session.title}</h3>
                    <p className="text-gray-500 mb-4">{session.description}</p>

                    <div className="flex flex-wrap gap-4">
                      {sessionSpeakers.map((speaker) => (
                        <div key={speaker.id} className="flex items-center space-x-3 bg-gray-100 dark:bg-gray-900 shadow-sm rounded-lg p-3">
                          <img
                            src={speaker.photo}
                            alt={speaker.name}
                            className="w-12 h-12 rounded-full object-cover"
                          />
                          <div>
                            <div className="text-gray-950 dark:text-gray-200 font-semibold">{speaker.name}</div>
                            <div className="text-gray-800 dark:text-gray-500 text-sm">{speaker.title}</div>
                          </div>
                        </div>
                      ))}
                    </div>
                  </div>
                </div>
              </div>
            );
          })}
        </div>
      </div>
    </section>
  );
};

export default ProgramSection;
