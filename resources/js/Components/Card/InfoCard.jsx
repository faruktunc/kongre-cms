import React from "react";
import { Book, Info } from "lucide-react";

export const InfoCard = ({ report }) => {
  return (
    <div className="flex flex-col bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden hover:shadow-2xl transition-shadow duration-300 w-full max-w-3xl mx-auto">
            <div className="flex flex-col items-center justify-center bg-gradient-to-br from-red-700 to-red-900 text-white p-4">
        <Book className="w-10 h-10 mb-2" />
        <h3 className="text-lg font-bold text-center">{report.title}</h3>
      </div>
      {report.steps && (
        <div className="flex flex-col gap-4 p-4 bg-gray-50 dark:bg-gray-700">
          {report.steps.map((step) => (
            <div key={step.step} className="flex flex-col gap-2 bg-white dark:bg-gray-800 p-3 rounded-lg border border-gray-200 dark:border-gray-600">
              <h4 className="font-semibold text-gray-900 dark:text-white">{step.step}. {step.title}</h4>
              <p className="text-gray-700 dark:text-gray-300 text-sm">{step.description}</p>

              {step.journals && (
                <ul className="list-disc list-inside text-gray-700 dark:text-gray-300 text-sm mt-1">
                  {step.journals.map((journal, idx) => <li key={idx}>{journal}</li>)}
                </ul>
              )}
            </div>
          ))}
        </div>
      )}
      <div className="p-4 space-y-2">
        <p className="text-gray-700 dark:text-gray-300">{report.overview}</p>
        {report.note && (
          <p className="flex items-center gap-2 text-gray-600 dark:text-gray-400 italic">
            <Info className="w-4 h-4" /> {report.note}
          </p>
        )}
      </div>
    </div>
  );
};
