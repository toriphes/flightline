import {useAsync, useAsyncFn} from "react-use";

export type Airport = {
  id: number;
  name: string;
  code: string;
  lat: number;
  lng: number;
}

export type Itinerary = {
  arrival: string;
  departure: string;
  itinerary: FlightTrip[];
  stops: number;
  total: number
}

export type Flight = {
  id: number;
  code_departure: string;
  code_arrival: string;
  price: number;
}

export type FlightTrip = {
  price: number;
  from: string;
  to: string
}

export function fetchAirports() {
  const url = import.meta.env.API_URL + '/api/airports'

  return useAsync(async () => {
    const response = await fetch(url);
    return await response.json() as Airport[];
  }, [url]);
}

export function fetchItinerary(params: {[key: string]: any}) {
  const queryString = new URLSearchParams(params);
  const url = import.meta.env.API_URL + '/api/flights/search?' + queryString.toString()

  return useAsyncFn(async () => {
    const response = await fetch(url);
    return await response.json() as Itinerary;
  }, [url]);
}

export function fetchFlights() {
  const url = import.meta.env.API_URL + '/api/flights'

  return useAsync(async () => {
    const response = await fetch(url);
    return await response.json() as Flight[];
  }, [url]);
}
