import React, { useState, useEffect } from 'react';
import { Users, Award, GraduationCap, ChevronDown, ChevronUp } from 'lucide-react';
import { getBoard } from "../../Services/apiClientServices";
import BoardCard from "../Card/BoardCard";

const BoardSection = () => {
  const [committees, setCommittees] = useState([]);

  useEffect(() => {
    getBoard().then((data) => {
      if(Array.isArray(data)) {
        const filtered = data.filter(s => s.isActive);
        setCommittees(filtered);
      }
    });
  }, []);

  return (
    <section className="min-h-screen flex flex-col py-20 bg-gradient-to-br from-gray-50 via-gray-100 to-gray-50 dark:bg-gradient-to-br dark:from-gray-950 dark:via-gray-900 dark:to-gray-950">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div className="text-center mb-16">
          <div className="inline-flex items-center gap-2 bg-red-50 dark:bg-blue-950/30 border border-red-200 dark:border-red-800 rounded-full px-6 py-2 mb-6">
            <Users className="w-5 h-5 text-red-500 dark:text-red-400" />
            <span className="text-sm font-semibold text-red-600 dark:text-red-400">Organizasyon</span>
          </div>
          <h2 className="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-4">
            Kurullarımız
          </h2>
          <p className="text-gray-600 dark:text-gray-400 text-lg max-w-2xl mx-auto">
            Etkinliğimizi başarıyla yöneten değerli akademisyenlerimiz
          </p>
        </div>

        <div className="grid grid-cols-1 lg:grid-cols-3 gap-8">
          {committees.map((committee, index) => (
            <BoardCard key={committee.id} committee={committee} index={index} />
          ))}
        </div>
      </div>
    </section>
  );
};

export default BoardSection;