export default function UpdateCarStatus() {
  const cars = [
    { id: 1, model: "Toyota Corolla", status: "active" },
    { id: 2, model: "Honda Civic", status: "rented" },
  ];

  const handleUpdateStatus = (id, newStatus) => {
    // Logic to update status
  };

  return (
    <div>
      <h3 className="text-lg font-semibold mb-2">Update Car Status</h3>
      <ul>
        {cars.map((car) => (
          <li key={car.id} className="flex justify-between mb-2">
            <span>
              {car.model} - {car.status}
            </span>
            <select
              className="p-2 border rounded"
              onChange={(e) => handleUpdateStatus(car.id, e.target.value)}
            >
              <option value="active">Active</option>
              <option value="out-of-service">Out of Service</option>
              <option value="rented">Rented</option>
            </select>
          </li>
        ))}
      </ul>
    </div>
  );
}
