import {
  MapContainer,
  Marker,
  Polygon,
  TileLayer,
  useMap,
} from "react-leaflet";
import { latLngBounds } from "leaflet";

export default function Map({ area, turbines, onTurbineSelected }) {
  const purpleOptions = { color: "purple" };

  const WindFarmArea = ({ area }) => {
    const map = useMap();
    let bounds = latLngBounds([]);

    area.forEach((point) => {
      bounds.extend(point);
    });

    map.fitBounds(bounds);

    return <Polygon pathOptions={purpleOptions} positions={area} />;
  };

  const TurbineMarker = ({ position, onClick }) => {
    return <Marker position={position} eventHandlers={{ click: onClick }} />;
  };

  return (
    <MapContainer className="w-full h-full" scrollWheelZoom={false}>
      <TileLayer
        attribution='&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
      />
      {area && <WindFarmArea area={area} />}
      {turbines.map((turbine) => (
        <TurbineMarker
          key={turbine.id}
          position={turbine.location}
          onClick={() => onTurbineSelected(turbine.id)}
        />
      ))}
    </MapContainer>
  );
}
