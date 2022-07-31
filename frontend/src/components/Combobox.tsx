import {
  ForwardedRef,
  forwardRef,
  Fragment,
  useState,
  HTMLAttributes,
  useEffect
} from 'react'
import {Combobox as HUICombobox, Transition} from '@headlessui/react'
import cx from 'classnames'
import {CheckIcon, SelectorIcon} from '@heroicons/react/solid'

export type ComboboxOption = {
  value: any;
  displayValue: string;
}

export interface ComboboxProps extends HTMLAttributes<HTMLInputElement> {
  value: any;
  placeholder: string;
  name: string;
  data: ComboboxOption[];
}

const Combobox = forwardRef(({data, onChange, value, name, placeholder, className, ...rest}: ComboboxProps, ref: ForwardedRef<HTMLInputElement>) => {
  const selectedOption = data.find(el => el.value === value)
  const [selected, setSelected] = useState(selectedOption)
  const [query, setQuery] = useState('')

  useEffect(() => {
    setSelected(selected || selectedOption)
  }, [data])

  function handleChange(ev: any) {
    console.log(ev)
    const newEvt = {target: {name, value:ev.value}}
    console.log(newEvt)
    /* @ts-ignore */
    if(onChange) {onChange(newEvt)}
    setSelected(ev)
  }

  const filteredOptions =
    query === ''
      ? data
      : data.filter((item) =>
        item.displayValue
          .toLowerCase()
          .replace(/\s+/g, '')
          .includes(query.toLowerCase().replace(/\s+/g, ''))
      )

  return (
    <HUICombobox value={selected} name={name} onChange={handleChange} nullable>
      <div className={cx(className, 'relative')}>
        <div
          className="relative cursor-default overflow-hidden rounded focus-within:bg-gray-100 bg-white text-left shadow-md sm:text-sm hover:bg-gray-100">
          <HUICombobox.Input
            className="bg-transparent py-4 w-full px-4 border-none pr-10 text-sm text-gray-900 focus:ring-0 outline-none"
            displayValue={(item: ComboboxOption) => item?.displayValue}
            onChange={(event) => setQuery(event.target.value)}
            ref={ref}
            placeholder={placeholder}
          />
          <HUICombobox.Button
            className="absolute inset-y-0 right-0 flex items-center pr-2">
            <SelectorIcon
              className="h-5 w-5 text-gray-400"
              aria-hidden="true"
            />
          </HUICombobox.Button>
        </div>
        <Transition
          as={Fragment}
          leave="transition ease-in duration-100"
          leaveFrom="opacity-100"
          leaveTo="opacity-0"
          afterLeave={() => setQuery('')}
        >
          <HUICombobox.Options
            className="absolute z-10 mt-1 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-0 ring-black focus:outline-none sm:text-sm">
            {filteredOptions.length === 0 && query !== '' ? (
              <div
                className="relative cursor-default select-none py-2 px-4 text-gray-700">
                Nothing found.
              </div>
            ) : (
              filteredOptions.map((item) => (
                <HUICombobox.Option
                  key={item.value}
                  className={({active}) =>
                    `relative cursor-default select-none py-2 pl-10 pr-4 ${
                      active ? 'bg-teal-700 text-white' : 'text-gray-900'
                    }`
                  }
                  value={item}
                >
                  {({selected, active}) => (
                    <>
                        <span
                          className={`block truncate ${
                            selected ? 'font-medium' : 'font-normal'
                          }`}
                        >
                          {item.displayValue}
                        </span>
                      {selected ? (
                        <span
                          className={`absolute inset-y-0 left-0 flex items-center pl-3 ${
                            active ? 'text-white' : 'text-teal-700'
                          }`}
                        >
                            <CheckIcon className="h-5 w-5" aria-hidden="true"/>
                          </span>
                      ) : null}
                    </>
                  )}
                </HUICombobox.Option>
              ))
            )}
          </HUICombobox.Options>
        </Transition>
      </div>
    </HUICombobox>
  )
})

export default Combobox
