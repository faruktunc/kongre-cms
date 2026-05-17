import axios from "axios";

const API_BASE = import.meta.env.VITE_API_BASE || "/api";

const api = axios.create({
  baseURL: API_BASE,
  headers: { "X-Requested-With": "XMLHttpRequest" }
});

export const getMenus = () => api.get("/menus").then(r => r.data);
export const getHomeComponent = () => api.get("/homeComponent").then((r) => r.data);
export const getSpeakersComponent = () => api.get("/speakersComponent").then((r) => r.data);
export const getContactSection = () => api.get("/contactComponent").then((r) => r.data);
export const getBoardComponent = () => api.get("/boardsComponent").then((r) => r.data);
export const getPdfComponent = () => api.get("/pdfComponent").then((r) => r.data);
export const getInfoPdfComponent = () => api.get("/infoPDFComponent").then((r) => r.data);
export const getSponsors = () => api.get("/sponsors").then(r => r.data);
export const getSpeakers = () => api.get("/speakers").then(r => r.data);
export const getEvents = () => api.get("/events").then(r => r.data);
export const getLogo = () => api.get("/logo").then(r => r.data);
export const getContact = () => api.get("/contact").then(r => r.data);
export const getBoard = () => api.get("/boards").then(r => r.data);
export const getPdf = () => api.get("/pdfDocument").then(r => r.data);
export const getInfoPdf = () => api.get('/infoPdf').then(r => r.data);
export const getConferenceInfo = () => api.get("/conferenceInfo").then(r => r.data);

export const getPageBySlug = (slug) => {
    return api.get("/menus").then(r => {
        const links = r.data?.menus?.links ?? r.data?.links ?? [];
        const page = links.find(p => p.slug === slug);
        return page || null;
    });
};

export default api;
