export default function reducer(componentTypes = [], action) {
  switch (action.type) {
    case "fetchComponentTypes/fulfilled":
      return action.payload;
    case "logout/fulfilled":
      return [];
    default:
      return componentTypes;
  }
}
