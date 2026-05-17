import React, { useState, useEffect } from "react";
import { getSpeakers } from "../../Services/apiClientServices";
import {SpeakerCard} from "../Card/SpeakerCard";

const AboutSpeaker = () => {
  const [speakers, setSpeakers] = useState([]);

  useEffect(() => {
    getSpeakers().then((data) => {
      if(Array.isArray(data)) {
        const filtered = data.filter(item => item.isActive);
        setSpeakers(filtered);
      }
    });
  }, []);

  if (!speakers.length) return null;

  return (
    <section className="py-20 dark:bg-gradient-to-br dark:from-gray-950 dark:via-gray-900 dark:to-gray-950 bg-gradient-to-r from-gray-50 via-gray-100 to-gray-200">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
          {speakers.map((speaker, index) => (
            <SpeakerCard key={speaker.id} speaker={speaker} index={index} />
          ))}
        </div>
      </div>
    </section>
  );
};

export default AboutSpeaker;
