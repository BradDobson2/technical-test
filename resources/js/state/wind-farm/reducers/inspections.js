export default function reducer(inspections = [], action) {
  switch (action.type) {
    case "fetchWindFarm/fulfilled":
      return action.payload.turbines
        .map((turbine) => turbine.inspections)
        .flat();
    case "logout/fulfilled":
      return [];
    default:
      return inspections;
  }
}
