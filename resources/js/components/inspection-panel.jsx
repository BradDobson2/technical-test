import { Fragment } from "react";
import { Dialog, Transition } from "@headlessui/react";
import {
  CalendarDaysIcon,
  UserCircleIcon,
  XMarkIcon,
} from "@heroicons/react/24/outline";
import { useSelector } from "react-redux";
import InspectionComponent from "./inspection-component";

export default function InspectionPanel({ turbineId, open, onClose }) {
  const turbine = useSelector((state) =>
    state.windFarm.turbines.find((turbine) => turbine.id === turbineId)
  );

  const inspection = useSelector((state) =>
    state.windFarm.inspections.find(
      (inspection) => inspection.turbine_id === turbineId
    )
  );

  return (
    <Transition.Root show={open} as={Fragment}>
      <Dialog
        as="div"
        className="relative"
        style={{ zIndex: 1000 }}
        onClose={onClose}
      >
        <div className="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
          <Transition.Child
            as={Fragment}
            enter="transform transition ease-in-out duration-500 sm:duration-700"
            enterFrom="translate-x-full"
            enterTo="translate-x-0"
            leave="transform transition ease-in-out duration-500 sm:duration-700"
            leaveFrom="translate-x-0"
            leaveTo="translate-x-full"
          >
            <Dialog.Panel className="pointer-events-auto w-screen max-w-md">
              <div className="flex h-full flex-col overflow-y-scroll bg-white py-6 shadow-xl">
                <div className="px-4 sm:px-6">
                  <div className="flex items-start justify-between">
                    <Dialog.Title className="text-base font-semibold leading-6 text-gray-900">
                      {turbine.name}
                    </Dialog.Title>
                    <div className="ml-3 flex h-7 items-center">
                      <button
                        type="button"
                        className="relative rounded-md bg-white text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                        onClick={onClose}
                      >
                        <span className="absolute -inset-2.5" />
                        <span className="sr-only">Close panel</span>
                        <XMarkIcon className="h-6 w-6" aria-hidden="true" />
                      </button>
                    </div>
                  </div>
                </div>
                <div className="relative mt-6 flex-1 px-4 sm:px-6">
                  <div className="flex w-full flex-none gap-x-4">
                    <dt className="flex-none">
                      <span className="sr-only">Client</span>
                      <UserCircleIcon
                        className="h-6 w-5 text-gray-400"
                        aria-hidden="true"
                      />
                    </dt>
                    <dd className="text-sm font-medium leading-6 text-gray-900">
                      {inspection.inspector_name}
                    </dd>
                  </div>
                  <div className="flex w-full flex-none gap-x-4 ">
                    <dt className="flex-none">
                      <CalendarDaysIcon
                        className="h-6 w-5 text-gray-400"
                        aria-hidden="true"
                      />
                    </dt>
                    <dd className="text-sm leading-6 text-gray-500">
                      <time dateTime="2023-01-31">
                        {inspection.inspection_date}
                      </time>
                    </dd>
                  </div>

                  {turbine.components.map((component) => (
                    <InspectionComponent
                      inspection={inspection}
                      component={component}
                    />
                  ))}
                </div>
              </div>
            </Dialog.Panel>
          </Transition.Child>
        </div>
      </Dialog>
    </Transition.Root>
  );
}
