import {fetchFlights} from "../api";

function Flights() {
  const fetchState = fetchFlights()

  return (
    <div className="container mx-auto px-4 md:px-0 sm:w-4/5 md:w-3/5 py-16">
      <h2 className="text-3xl mb-16">Flight list</h2>

      {fetchState.value && (
        <table className="table-auto border-collapse w-full text-sm">
          <thead>
          <tr>
            <th className="border-b font-medium p-4 pl-8 pt-0 pb-3 text-left">Departure</th>
            <th className="border-b font-medium p-4 pl-8 pt-0 pb-3 text-left">Arrival</th>
            <th className="border-b font-medium p-4 pl-8 pt-0 pb-3 text-left">Price</th>
          </tr>
          </thead>
          <tbody>
          {fetchState.value.map(flight => (
            <tr>
              <td className="border-b border-slate-100 p-4 pl-8 text-slate-500">{flight.code_arrival}</td>
              <td className="border-b border-slate-100 p-4 pl-8 text-slate-500">{flight.code_departure}</td>
              <td className="border-b border-slate-100 p-4 pl-8 text-slate-500">{flight.price}</td>
            </tr>
          ))}
          </tbody>
        </table>
      )}
    </div>
  )
}

export default Flights
