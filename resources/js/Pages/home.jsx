import React from "react";
import MainLayout from "../Layout/main";
import SliderSection from "../Components/Home/SliderSection";
import AboutConference from "../Components/Home/AboutConference";
import ProgramSection from "../Components/Home/ProgramSection";
import SponsorsSection from "../Components/Home/SponsorsSection";
import HomePopupModal from "../Components/Home/HomePopupModal";

export default function Home() {
    return (
        <MainLayout>
            <HomePopupModal />
            <SliderSection />
            {/*<AboutConference />*/}
            <ProgramSection />
            <SponsorsSection />
        </MainLayout>
    );
}
