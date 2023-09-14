export default function reducer(componentGrades = [], action) {
  switch (action.type) {
    case "fetchComponentGrades/fulfilled":
      return action.payload;
    case "logout/fulfilled":
      return [];
    default:
      return componentGrades;
  }
}
