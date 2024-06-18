
namespace App\Http\Controllers;

use App\Models\Room; // Assuming you have a Room model

class FloorAndRoomController extends Controller
{
    public function getFloorsAndRooms($blockId)
    {
        // Retrieve floors and rooms based on the provided block ID
        $floors = Room::where('block_id', $blockId)->distinct()->pluck('floor')->all();
        $rooms = Room::where('block_id', $blockId)->distinct()->pluck('roomNumber')->all();

        // Return the floors and rooms as JSON
        return response()->json([
            'floors' => $floors,
            'rooms' => $rooms
        ]);
    }
}
