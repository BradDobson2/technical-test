import { useSelector } from "react-redux";
import { Navigate } from "react-router-dom";

export default function UnauthenticatedRoute(props) {
  const user = useSelector((state) => state.user);

  if (user) {
    return <Navigate to="/" />;
  }

  return props.children;
}
