import { useEffect, useState } from "react";
import { ArrowLeftOnRectangleIcon } from "@heroicons/react/24/outline";
import Icon from "../components/icon";
import { fulfilled, inProgress } from "../state/request-statuses";
import LoadingSpinner from "../components/loading-spinner";
import { fetchWindFarm } from "../state/wind-farm/actions";
import { useDispatch, useSelector } from "react-redux";
import Map from "../components/map";
import InspectionPanel from "../components/inspection-panel";
import { fetchComponentTypes } from "../state/component-types/actions";
import { fetchComponentGrades } from "../state/component-grades/actions";
import { logout } from "../state/user/actions";

function classNames(...classes) {
  return classes.filter(Boolean).join(" ");
}

export default function Inspector() {
  const [selectedTurbine, setSelectedTurbine] = useState(null);

  const dispatch = useDispatch();
  const requestStatus = useSelector((state) => state.requests.fetchWindFarm);
  const windFarm = useSelector((state) => state.windFarm.windFarm);
  const turbines = useSelector((state) => state.windFarm.turbines);
  const user = useSelector((state) => state.user);

  useEffect(() => {
    dispatch(fetchComponentTypes());
    dispatch(fetchComponentGrades());
    dispatch(fetchWindFarm());
  }, []);

  return (
    <>
      <div>
        <div className="hidden lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-72 lg:flex-col">
          <div className="flex grow flex-col gap-y-5 overflow-y-auto bg-gray-900 px-6 pb-4">
            <div className="flex h-16 shrink-0 items-center">
              <Icon className="fill-indigo-500 h-10 w-auto" />
            </div>
            <nav className="flex flex-1 flex-col">
              <ul role="list" className="flex flex-1 flex-col gap-y-7">
                {requestStatus === inProgress && <LoadingSpinner />}
                {requestStatus === fulfilled && windFarm && (
                  <li>
                    <div className="text-sm font-semibold leading-6 text-white">
                      {windFarm.name}
                    </div>
                    <ul role="list" className="-mx-2 mt-8 space-y-1">
                      {turbines.map((turbine) => (
                        <li key={turbine.id}>
                          <button
                            className={classNames(
                              selectedTurbine === turbine.id
                                ? "bg-indigo-700 text-white"
                                : "text-white hover:text-white hover:bg-indigo-700",
                              "cursor-pointer w-full group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold"
                            )}
                            onClick={() => setSelectedTurbine(turbine.id)}
                          >
                            <span className="truncate">{turbine.name}</span>
                          </button>
                        </li>
                      ))}
                    </ul>
                  </li>
                )}
                <li className="mt-auto">
                  <button
                    className="w-full cursor-pointer group -mx-2 flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 text-indigo-200 hover:bg-indigo-700 hover:text-white"
                    onClick={() => dispatch(logout())}
                  >
                    <ArrowLeftOnRectangleIcon
                      className="h-6 w-6 shrink-0 text-indigo-200 group-hover:text-white"
                      aria-hidden="true"
                    />
                    {user.email}
                  </button>
                </li>
              </ul>
            </nav>
          </div>
        </div>

        <div className="lg:pl-72 w-screen h-screen">
          <Map
            area={windFarm?.area[0]}
            turbines={turbines}
            onTurbineSelected={(turbineId) => setSelectedTurbine(turbineId)}
          />
        </div>
      </div>

      {selectedTurbine && (
        <InspectionPanel
          open={selectedTurbine !== null}
          turbineId={selectedTurbine}
          onClose={() => setSelectedTurbine(null)}
        />
      )}
    </>
  );
}
