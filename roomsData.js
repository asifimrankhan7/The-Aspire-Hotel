const roomsData = {
  royale: {
    name: "Royale Family Room",
    price: "₹4,500",
    description: "Experience the perfect blend of comfort and style in our Royale Family Room. Ideal for families or small groups, this room offers a warm, inviting atmosphere with modern touches and essential amenities to ensure a memorable stay in Guwahati.",
    size: "28 M²",
    beds: "1 King Bed",
    guests: "2 Adults - 1 Child",
    view: "Street View",
    gallery: [
      { url: "./assets/hero_1.png", title: "Royale Suite Main" },
      { url: "file:///Users/asifimrankhan/.gemini/antigravity/brain/25294ca1-02c7-43f1-b9d2-5be7e21aaf0c/royale_room_interior_1776404584893.png", title: "Boutique Interiors" },
      { url: "file:///Users/asifimrankhan/.gemini/antigravity/brain/25294ca1-02c7-43f1-b9d2-5be7e21aaf0c/royale_room_bathroom_1776404599894.png", title: "Modern Bathroom" },
      { url: "file:///Users/asifimrankhan/.gemini/antigravity/brain/25294ca1-02c7-43f1-b9d2-5be7e21aaf0c/royale_washroom_v2_1776404808137.png", title: "Premium Washroom" }
    ],
    roomAmenities: [
      { name: "Free High-speed Wi-Fi", icon: "wifi" },
      { name: "Smart LED TV", icon: "tv" },
      { name: "Mini-bar & Coffee Station", icon: "coffee" },
      { name: "Air Conditioning", icon: "thermometer" },
      { name: "Luxury Toiletry Set", icon: "sparkles" },
      { name: "Daily Housekeeping", icon: "check-circle" },
      { name: "Electronic Safe", icon: "shield" },
      { name: "Iron & Ironing Board", icon: "archive" },
      { name: "Hair Dryer", icon: "activity" },
      { name: "Soundproof Windows", icon: "volume-x" }
    ],
    hotelAmenities: [
      { name: "Grand Restaurant", icon: "utensils" },
      { name: "Rooftop Pool", icon: "droplet" },
      { name: "Spa & Wellness", icon: "heart" },
      { name: "24/7 Security", icon: "shield" },
      { name: "Concierge Service", icon: "user-check" },
      { name: "Free Parking", icon: "truck" },
      { name: "Fitness Center", icon: "activity" },
      { name: "Business Center", icon: "briefcase" },
      { name: "Laundry Service", icon: "archive" },
      { name: "Travel Desk", icon: "map-pin" }
    ]
  },
  premium: {
    name: "Premium Family Room",
    price: "₹7,500",
    description: "Our Premium Family Room offers elevated luxury with expansive city views and sophisticated décor. Designed for discerning travelers who seek both space and style, it provides a sanctuary of peace in the heart of the bustling city.",
    size: "42 M²",
    beds: "1 King Bed",
    guests: "2 Adults - 1 Child",
    view: "City View",
    gallery: [
      { url: "./assets/room_deluxe_coll.png", title: "Premium Suite Main" },
      { url: "file:///Users/asifimrankhan/.gemini/antigravity/brain/25294ca1-02c7-43f1-b9d2-5be7e21aaf0c/premium_room_interior_1776404613752.png", title: "Modern Luxury Decor" },
      { url: "file:///Users/asifimrankhan/.gemini/antigravity/brain/25294ca1-02c7-43f1-b9d2-5be7e21aaf0c/premium_room_bathtub_1776404632518.png", title: "Skyline Bathtub" }
    ],
    roomAmenities: [
      { name: "Free High-speed Wi-Fi", icon: "wifi" },
      { name: "55-inch Smart TV", icon: "tv" },
      { name: "Premium Mini-bar", icon: "coffee" },
      { name: "Climate Control", icon: "thermometer" },
      { name: "Luxury Bathrobes", icon: "sparkles" },
      { name: "Walk-in Closet", icon: "archive" },
      { name: "Bluetooth Speaker", icon: "volume-2" },
      { name: "Nespresso Coffee Machine", icon: "coffee" },
      { name: "Premium Pillow Menu", icon: "feather" },
      { name: "USB Charging Ports", icon: "battery-charging" }
    ],
    hotelAmenities: [
      { name: "Grand Restaurant", icon: "utensils" },
      { name: "Rooftop Pool", icon: "droplet" },
      { name: "Spa & Wellness", icon: "heart" },
      { name: "Fitness Center", icon: "activity" },
      { name: "Business Center", icon: "briefcase" },
      { name: "Free Parking", icon: "truck" },
      { name: "Valet Service", icon: "key" },
      { name: "Meeting Rooms", icon: "users" },
      { name: "Executive Lounge", icon: "coffee" },
      { name: "24/7 Room Service", icon: "bell" }
    ]
  },
  deluxe: {
    name: "Deluxe Double Room",
    price: "₹12,000",
    description: "Succumb to the ultimate hotel experience in our Deluxe Double Room. This suite-style accommodation features a separate living area, panoramic skyline views, and bespoke services, making it the premier choice for elite travelers and special occasions.",
    size: "85 M²",
    beds: "2 King Beds",
    guests: "4 Adults",
    view: "Skyline View",
    gallery: [
      { url: "file:///Users/asifimrankhan/.gemini/antigravity/brain/25294ca1-02c7-43f1-b9d2-5be7e21aaf0c/deluxe_suite_interior_1776404647052.png", title: "Deluxe Presidential Suite" },
      { url: "file:///Users/asifimrankhan/.gemini/antigravity/brain/25294ca1-02c7-43f1-b9d2-5be7e21aaf0c/deluxe_suite_dining_1776404661870.png", title: "Dining & Living Area" },
      { url: "file:///Users/asifimrankhan/.gemini/antigravity/brain/25294ca1-02c7-43f1-b9d2-5be7e21aaf0c/deluxe_suite_jacuzzi_v2_1776404732501.png", title: "Private Jacuzzi" }
    ],
    roomAmenities: [
      { name: "Free Ultra-high-speed Wi-Fi", icon: "wifi" },
      { name: "Home Theater System", icon: "tv" },
      { name: "Complimentary Suite Bar", icon: "coffee" },
      { name: "Smart Room Automation", icon: "thermometer" },
      { name: "Jacuzzi & Rain Shower", icon: "droplet" },
      { name: "Personal Butler Service", icon: "user-check" },
      { name: "Separate Living Room", icon: "layout" },
      { name: "Dining Area", icon: "utensils" },
      { name: "Luxury Bedding Selection", icon: "feather" },
      { name: "Welcome Champagne", icon: "glass-water" }
    ],
    hotelAmenities: [
      { name: "Grand Restaurant (VIP Access)", icon: "utensils" },
      { name: "Rooftop Pool & Bar", icon: "droplet" },
      { name: "Spa & Wellness", icon: "heart" },
      { name: "Private Lounge", icon: "coffee" },
      { name: "Limousine Service", icon: "truck" },
      { name: "Valet Parking", icon: "key" },
      { name: "Personal Fitness Trainer", icon: "activity" },
      { name: "VIP Check-in", icon: "shield-check" },
      { name: "Exclusive Terrace Access", icon: "sun" },
      { name: "Private Tour Guide", icon: "map" }
    ]
  }
};

if (typeof module !== 'undefined' && module.exports) {
  module.exports = roomsData;
} else {
  window.roomsData = roomsData;
}
