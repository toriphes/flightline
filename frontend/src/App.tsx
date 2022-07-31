import {Outlet} from "react-router-dom";
import Header from "./components/Header";

function App() {
  return (
    <>
      <Header/>
      <main className="pt-16">
        <Outlet/>
      </main>
    </>
  )
}

export default App
