import React, { useState, useEffect } from "react";
import { getInfoPdf } from "../../Services/apiClientServices";
import { InfoCard } from "../Card/InfoCard";

const InfoPdfSection = () => {
  const [reports, setReports] = useState([]);

  useEffect(() => {
    getInfoPdf().then((data) => setReports(data));
  }, []);

  if (!reports.length) return null;

  return (
    <section className="py-20 dark:bg-gradient-to-br dark:from-gray-950 dark:via-gray-900 dark:to-gray-950 bg-gradient-to-r from-gray-50 via-gray-100 to-gray-200">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col gap-8">
        {reports.map((report, index) => (
          <InfoCard key={index} report={report} />
        ))}
      </div>
    </section>
  );
};

export default InfoPdfSection;
