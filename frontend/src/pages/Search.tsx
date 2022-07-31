import hero from '../assets/hero.jpg'
import SearchForm from "../components/SearchForm";
import {useState} from "react";
import {Itinerary} from "../api";

function Search() {
  const [itinerary, setItinerary] = useState<Itinerary>()


  const handleOnFetch = (data: Itinerary) => {
    setItinerary(data)
  }

  return (
    <div className="bg-cover h-screen -mt-16 flex py-32"
         style={{backgroundImage: `url(${hero})`}}>

      <div className="container mx-auto px-4 md:px-0 sm:w-4/5 md:w-3/5">
        <SearchForm onFetch={handleOnFetch}/>

        {itinerary &&
          <div
            className="overflow-hidden rounded shadow-md flex flex-col sm:flex-row mt-14">
            {itinerary.total === -1 ? (
              <div className="bg-white p-4 text-center grow text-center">
                <h3 className="text-xl">Sorry! no flights found for these criteria :-(</h3>
                <p className="text-gray-500 mt-2">Try another query</p>
              </div>
            ) : (
              <>
                <div
                  className="grow bg-white p-4 flex flex-col gap-2 justify-center">
                  {itinerary.itinerary.map(step => (
                    <div className="flex gap-4">
                      <h4 className="text-xl basis-10">{step.from}</h4>
                      <div className="grow">
                        <div
                          className="text-center relative z-1 before:content-[''] before:absolute before:w-full before:h-px before:bg-gray-300 before:left-0 before:top-1/2">
                          <span
                            className="bg-white relative px-4 text-gray-500">&euro; {step.price}</span>
                        </div>
                      </div>
                      <h4 className="text-xl basis-10">{step.to}</h4>
                    </div>
                  ))}
                </div>
                <div
                  className="h-px w-full sm:w-px sm:h-auto bg-gray-300 relative">
                </div>
                <div
                  className="p-4 bg-white flex items-center justify-center flex-col basis-1/3 text-center">
                  <div
                    className="text-gray-500 text-sm font-light">Stops: {itinerary.stops}</div>
                  <h3 className="text-xl">&euro; {itinerary.total}</h3>
                </div>
              </>
            )}

          </div>
        }

      </div>
    </div>
  )
}

export default Search
