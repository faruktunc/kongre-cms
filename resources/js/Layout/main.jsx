import Header from '../Components/Template/header';
import Footer from '../Components/Template/footer';
import Seo from '../Components/Seo';

export default function MainLayout({ children, seo }) {
  return (
    <>
      <Seo {...seo} />
      <Header />
      <main className='flex-grow'>{children}</main>
      <Footer />
    </>
  );
}