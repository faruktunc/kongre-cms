import axios from "axios";

const API_BASE = import.meta.env.VITE_API_BASE || "http://localhost:3006";

const api = axios.create({
  baseURL: API_BASE,
  headers: { "X-Requested-With": "XMLHttpRequest" }
});

// Menüler
export const getMenus = () => api.get("/menus").then(r => r.data);

// homeSections
export const getHomeComponent = () => api.get("/homeComponent").then((r) => r.data);

//SpeakersSections
export const getSpeakersComponent = () => api.get("/speakersComponent").then((r) => r.data);

//contactSection
export const getContactSection = () => api.get("/contactComponent").then((r) => r.data);

//BoardComponent
export const getBoardComponent = () => api.get("/boardsComponent").then((r) => r.data);

//PDF Component
export const getPdfComponent = () => api.get("/pdfComponent").then((r) => r.data);

//PDF Info Component
export const getInfoPdfComponent = () => api.get("/infoPDFComponent").then((r) => r.data);

// Sponsorlar
export const getSponsors = () => api.get("/sponsors").then(r => r.data);

// Konuşmacılar
export const getSpeakers = () => api.get("/speakers").then(r => r.data);

// Takvim / etkinlikler
export const getEvents = () => api.get("/events").then(r => r.data);

//Logo ve Başlık
export const getLogo = () => api.get("/logo").then(r => r.data);

//Contact
export const getContact = () => api.get("/contact").then(r => r.data);

// Board verileri
export const getBoard = () => api.get("/boards").then(r => r.data);

// PDF verisi
export const getPdf = () => api.get("/pdfDocument").then(r => r.data);

//info PDf 
export const getInfoPdf = () => api.get('/infoPdf').then(r => r.data);

//Conference Info
export const getConferenceInfo = () => api.get("/conferenceInfo").then(r => r.data);

export const getPageBySlug = (slug) => {
    return api.get("/menus").then(r => {
        const page = r.data.links.find(p => p.slug === slug);
        return page || null;
    });
};


export default api;
