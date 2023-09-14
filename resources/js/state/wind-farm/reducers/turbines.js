export default function reducer(turbines = [], action) {
  switch (action.type) {
    case "fetchWindFarm/fulfilled":
      return action.payload.turbines;
    case "logout/fulfilled":
      return [];
    default:
      return turbines;
  }
}
