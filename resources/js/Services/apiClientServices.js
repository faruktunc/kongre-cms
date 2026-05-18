import axios from "axios";

const API_BASE = import.meta.env.VITE_API_BASE || "/api";

const api = axios.create({
  baseURL: API_BASE,
  headers: { "X-Requested-With": "XMLHttpRequest" }
});

export const getMenus = () => api.get("/menus").then(r => r.data);
export const getSponsors = () => api.get("/sponsors").then(r => r.data);
export const getSpeakers = () => api.get("/speakers").then(r => r.data);
export const getEvents = () => api.get("/events").then(r => r.data);
export const getSessions = () => api.get("/sessions").then(r => r.data);
export const getLogo = () => api.get("/logo").then(r => r.data);
export const getContact = () => api.get("/contact").then(r => r.data);
export const getBoard = () => api.get("/boards").then(r => r.data);
export const getAboutConference = () => api.get("/aboutConference").then(r => r.data);

export const getPageBySlug = (slug) => {
    return api.get("/menus").then(r => {
        const links = r.data?.menus?.links ?? r.data?.links ?? [];
        const page = links.find(p => p.slug === slug);
        return page || null;
    });
};

export default api;
