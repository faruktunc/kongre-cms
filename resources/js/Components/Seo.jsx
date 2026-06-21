import { Head } from "@inertiajs/react";

const SITE_NAME = "12. Ulusal Analitik Kimya Kongresi";

const DEFAULT_TITLE = "12. Ulusal Analitik Kimya Kongresi";

const DEFAULT_DESCRIPTION =
    "12. Ulusal Analitik Kimya Kongresi, Gümüşhane'de düzenlenen ulusal kimya kongresidir. UAAK 2027";

const DEFAULT_KEYWORDS =
    "12. Ulusal Analitik Kimya Kongresi, Gümüşhane, Kimya Kongresi, Analitik Kimya Kongresi, Ulusal Kimya Kongresi, Gümüşhane Üniversitesi, Analitik Kimya";

export default function Seo({ title, description, keywords }) {
    const pageTitle = title ? `${title} | ${SITE_NAME}` : DEFAULT_TITLE;

    return (
        <Head>
            <title>{pageTitle}</title>
            <meta name="description" content={description || DEFAULT_DESCRIPTION} />
            <meta name="keywords" content={keywords || DEFAULT_KEYWORDS} />
        </Head>
    );
}
