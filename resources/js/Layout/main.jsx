import Header from '../Components/Template/header';
import Footer from '../Components/Template/footer';

export default function MainLayout({ children }) {
  return (
    <>
      <Header />
      <main className='flex-grow'>{children}</main>
      <Footer />
    </>
  );
}