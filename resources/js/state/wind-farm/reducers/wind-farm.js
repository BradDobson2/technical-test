export default function reducer(windFarm = null, action) {
  switch (action.type) {
    case "fetchWindFarm/fulfilled":
      return {
        id: action.payload.id,
        name: action.payload.name,
        area: action.payload.area,
      };
    case "logout/fulfilled":
      return null;
    default:
      return windFarm;
  }
}
