public function storeEntreprise(Request $request)
{
// Validation des données
$validatedData = $request->validate([
'name' => 'required|string|max:255',
'description' => 'nullable|string',
'address' => 'nullable|string|max:255',
'email' => 'required|email|max:255',
'phone' => 'nullable|string|max:20',
'website' => 'nullable|url|max:255',
'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
'country_id' => 'nullable|integer|exists:countries,id',
'city_id' => 'nullable|integer|exists:cities,id',
'type_entreprise' => 'nullable|string|max:100',
'capital' => 'nullable|numeric',
]);

// Gestion du logo
$logoPath = null;
if ($request->hasFile('logo')) {
$logoPath = $request->file('logo')->store('logos', 'public');
}

// Création ou mise à jour de l'entreprise
$entreprise = Entreprise::updateOrCreate(
['email' => $request->email], // Condition de recherche (email)
[
'name' => $request->name,
'description' => $request->description,
'address' => $request->address,
'phone' => $request->phone,
'website' => $request->website,
'logo' => $logoPath ?? Entreprise::where('email', $request->email)->value('logo'), // Conserver le logo existant si non modifié
'country_id' => $request->country_id,
'city_id' => $request->city_id,
'type_entreprise' => $request->type_entreprise,
'capital' => $request->capital,
]
);

// Réponse avec succès
if ($entreprise->wasRecentlyCreated) {
return redirect()->back()->with('success', 'Entreprise créée avec succès.');
} else {
return redirect()->back()->with('success', 'Entreprise mise à jour avec succès.');
}
}
