import React, {ChangeEvent, FormEvent, useMemo, useReducer} from 'react';
import {SearchIcon, RefreshIcon} from '@heroicons/react/outline';
import cx from 'classnames';
import {fetchAirports, fetchItinerary, Itinerary} from '../api'
import Combobox from "./Combobox";

export type SearchFormProps = {
  onFetch: (data: Itinerary) => void
}

export type SearchFormState = {
  departure: string;
  arrival: string;
  stops: number;
}

const formReducer = (state: SearchFormState, event: { name: string, value: unknown }) => {
  return {
    ...state,
    [event.name]: event.value
  }
}

function SearchForm({onFetch}: SearchFormProps) {
  const [formData, setFormData] = useReducer(formReducer, {
    departure: 'CTA',
    arrival: 'MXP',
    stops: 3
  })
  const [searchState, doSearch] = fetchItinerary(formData)
  const fetchState = fetchAirports()
  const airports = useMemo(() => fetchState.value ? fetchState.value.map(el => ({
    value: el.code,
    displayValue: `${el.name} - ${el.code}`
  })) : [], [fetchState.value])

  const handleChange = (event: ChangeEvent<HTMLInputElement>) => {
    setFormData({
      name: event.target.name,
      value: event.target.value,
    });
  }

  const handleSubmit = (ev: FormEvent<HTMLFormElement>) => {
    ev.preventDefault()
    doSearch().then((data) => onFetch(data));
  }

  const stops = [
    {value: 0, displayValue: '0 Stops'},
    {value: 1, displayValue: '1 Stop'},
    {value: 2, displayValue: '2 Stops'},
    {value: 3, displayValue: '3 Stops'},
  ]

  return (
    <form onSubmit={handleSubmit}>
      <div className="flex flex-col lg:flex-row gap-4">
        <div
          className="flex flex-col md:flex-row gap-4 grow items-stretch place-items-stretch">
          <Combobox name="departure" className="grow" value={formData.departure}
                    data={airports} placeholder="Departure"
                    onChange={handleChange}/>
          <Combobox name="arrival" className="grow" value={formData.arrival}
                    data={airports} placeholder="Arrival"
                    onChange={handleChange}/>
        </div>
        <div className="flex flex-col lg:flex-row gap-4">
          <Combobox name="stops" value={formData.stops} data={stops}
                    placeholder="Stops" onChange={handleChange}/>
          <button
            className={cx("p-4 bg-teal-700 text-white flex justify-center rounded font-bold hover:bg-teal-800", {'opacity-80': searchState.loading})}
            disabled={searchState.loading} type="submit">
            <div className="flex gap-2">
            {searchState.loading ? <RefreshIcon className="w-6 animate-spin"/> :
              <SearchIcon className="w-6"/>}
              <span className="lg:hidden">Cerca</span>
            </div>
          </button>
        </div>
      </div>
    </form>
  );
}

export default SearchForm;
