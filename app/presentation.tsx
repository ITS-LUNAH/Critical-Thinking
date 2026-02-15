'use client';

import React, { useState } from 'react';
import { ChevronLeft, ChevronRight, Volume2, Play } from 'lucide-react';

const PresentationApp = () => {
  const [currentSlide, setCurrentSlide] = useState(0);
  const [notes, setNotes] = useState('');

  const slides = [
    // SLIDE 1: COUVERTURE
    {
      title: "CRITICAL THINKING GAMES",
      subtitle: "Plateforme Interactive de Développement de la Pensée Critique",
      time: "0:00 - 0:30",
      notes: "Bienvenue à cette présentation du projet Critical Thinking Games. Nous avons créé une plateforme complète pour développer les compétences de pensée critique à travers des jeux interactifs et engageants.",
      content: (
        <div className="text-center space-y-8">
          <h1 className="text-6xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
            CRITICAL THINKING GAMES
          </h1>
          <p className="text-3xl text-gray-700">Plateforme Interactive de Développement de la Pensée Critique</p>
          <div className="mt-12 pt-12 border-t-2 border-gray-300">
            <p className="text-lg text-gray-600">Durée totale: 20 minutes</p>
          </div>
        </div>
      )
    },

    // SLIDE 2: OBJECTIFS DE L'INTRODUCTION
    {
      title: "INTRODUCTION",
      subtitle: "Contexte et Objectifs",
      time: "0:30 - 2:30",
      notes: "Nous vivons dans une époque où les informations sont abondantes mais souvent contradictoires. La pensée critique est devenue une compétence essentielle. Notre projet répond à ce besoin en créant une plateforme ludique qui entraîne cette capacité.",
      content: (
        <div className="space-y-8">
          <div className="bg-blue-50 border-l-4 border-blue-600 p-6">
            <h3 className="text-2xl font-bold text-blue-900 mb-3">Le Problème</h3>
            <p className="text-lg text-blue-800">La pensée critique n'est pas enseignée de manière ludique et engageante. Les méthodes traditionnelles manquent d'interactivité.</p>
          </div>

          <div className="bg-green-50 border-l-4 border-green-600 p-6">
            <h3 className="text-2xl font-bold text-green-900 mb-3">Notre Solution</h3>
            <p className="text-lg text-green-800">Une plateforme web interactive proposant 4 jeux distincts pour développer différents aspects de la pensée critique.</p>
          </div>

          <div className="grid grid-cols-2 gap-4">
            <div className="bg-purple-50 p-4 rounded-lg">
              <p className="font-bold text-purple-900">Public Cible</p>
              <p className="text-sm text-purple-800">Étudiants, professionnels, apprenants</p>
            </div>
            <div className="bg-orange-50 p-4 rounded-lg">
              <p className="font-bold text-orange-900">Objectif Principal</p>
              <p className="text-sm text-orange-800">Améliorer l'analyse et la décision</p>
            </div>
          </div>
        </div>
      )
    },

    // SLIDE 3: CONCEPTION ET ANALYSE
    {
      title: "CONCEPTION ET ANALYSE",
      subtitle: "Analyse des Besoins",
      time: "2:30 - 5:00",
      notes: "Nous avons réalisé une analyse approfondie des compétences de pensée critique que nous voulions développer. Cela nous a menés à créer 4 types de jeux différents, chacun ciblant une compétence spécifique.",
      content: (
        <div className="space-y-6">
          <h3 className="text-2xl font-bold text-gray-900">Analyse des Besoins</h3>
          
          <div className="grid grid-cols-1 gap-4">
            <div className="border-l-4 border-blue-500 bg-blue-50 p-4">
              <p className="font-bold text-blue-900">Compétences Ciblées</p>
              <ul className="text-sm text-blue-800 mt-2 space-y-1">
                <li>✓ Classement logique (Puzzle)</li>
                <li>✓ Mémorisation et rappel (Quiz)</li>
                <li>✓ Discrimination fact/fiction (Fact)</li>
                <li>✓ Reconstruction d'informations (Mind Puzzle)</li>
              </ul>
            </div>
          </div>

          <div className="grid grid-cols-3 gap-3 mt-6">
            <div className="bg-gradient-to-br from-blue-500 to-blue-600 text-white p-4 rounded-lg">
              <p className="text-3xl font-bold">4</p>
              <p className="text-sm">Types de Jeux</p>
            </div>
            <div className="bg-gradient-to-br from-purple-500 to-purple-600 text-white p-4 rounded-lg">
              <p className="text-3xl font-bold">∞</p>
              <p className="text-sm">Questions Illimitées</p>
            </div>
            <div className="bg-gradient-to-br from-orange-500 to-orange-600 text-white p-4 rounded-lg">
              <p className="text-3xl font-bold">100%</p>
              <p className="text-sm">Interactif</p>
            </div>
          </div>
        </div>
      )
    },

    // SLIDE 4: ARCHITECTURE GÉNÉRALE
    {
      title: "CONCEPTION ET ANALYSE",
      subtitle: "Architecture Système",
      time: "5:00 - 5:45",
      notes: "L'architecture suit le pattern MVC (Model-View-Controller) qui sépare la logique métier, la présentation et le contrôle. Cela rend le système maintenable et scalable.",
      content: (
        <div className="space-y-6">
          <div className="text-center">
            <div className="inline-block bg-gray-100 p-8 rounded-lg">
              <div className="flex items-center justify-between gap-8">
                <div className="text-center">
                  <div className="bg-blue-500 text-white w-24 h-24 rounded-lg flex items-center justify-center mb-2">
                    <p className="font-bold text-sm">VIEW</p>
                  </div>
                  <p className="text-xs font-bold">Interface</p>
                </div>
                <div className="text-2xl text-gray-400">↔</div>
                <div className="text-center">
                  <div className="bg-purple-500 text-white w-24 h-24 rounded-lg flex items-center justify-center mb-2">
                    <p className="font-bold text-sm">CONTROLLER</p>
                  </div>
                  <p className="text-xs font-bold">Logique</p>
                </div>
                <div className="text-2xl text-gray-400">↔</div>
                <div className="text-center">
                  <div className="bg-green-500 text-white w-24 h-24 rounded-lg flex items-center justify-center mb-2">
                    <p className="font-bold text-sm">MODEL</p>
                  </div>
                  <p className="text-xs font-bold">Données</p>
                </div>
              </div>
            </div>
          </div>

          <div className="grid grid-cols-3 gap-3 mt-6">
            <div className="bg-blue-50 p-3 rounded border border-blue-300">
              <p className="font-bold text-blue-900 text-sm">PHP & MySQL</p>
              <p className="text-xs text-blue-800 mt-1">Backend robuste</p>
            </div>
            <div className="bg-purple-50 p-3 rounded border border-purple-300">
              <p className="font-bold text-purple-900 text-sm">Sécurité Bcrypt</p>
              <p className="text-xs text-purple-800 mt-1">Authentification sécurisée</p>
            </div>
            <div className="bg-green-50 p-3 rounded border border-green-300">
              <p className="font-bold text-green-900 text-sm">Sessions PHP</p>
              <p className="text-xs text-green-800 mt-1">Gestion utilisateur</p>
            </div>
          </div>
        </div>
      )
    },

    // SLIDE 5: LES 4 JEUX - APERÇU
    {
      title: "ÉTUDE TECHNIQUE",
      subtitle: "Les 4 Jeux - Vue d'Ensemble",
      time: "5:45 - 8:00",
      notes: "Voici les 4 jeux différents que notre plateforme propose. Chacun a sa propre logique, sa propre base de données, et son propre système de scoring.",
      content: (
        <div className="grid grid-cols-2 gap-4">
          <div className="bg-gradient-to-br from-blue-500 to-blue-600 text-white p-4 rounded-lg">
            <h4 className="font-bold text-lg mb-2">1. PUZZLE</h4>
            <p className="text-sm mb-3">Classez les étapes d'une procédure dans le bon ordre logique</p>
            <div className="bg-white bg-opacity-20 p-2 rounded text-xs">
              <p>Compétence: Logique séquentielle</p>
            </div>
          </div>

          <div className="bg-gradient-to-br from-purple-500 to-purple-600 text-white p-4 rounded-lg">
            <h4 className="font-bold text-lg mb-2">2. QUIZ</h4>
            <p className="text-sm mb-3">Répondez à des questions sur la pensée critique</p>
            <div className="bg-white bg-opacity-20 p-2 rounded text-xs">
              <p>Compétence: Mémoire et connaissance</p>
            </div>
          </div>

          <div className="bg-gradient-to-br from-green-500 to-green-600 text-white p-4 rounded-lg">
            <h4 className="font-bold text-lg mb-2">3. FACT OR FICTION</h4>
            <p className="text-sm mb-3">Distinguez les affirmations vraies des fausses</p>
            <div className="bg-white bg-opacity-20 p-2 rounded text-xs">
              <p>Compétence: Discrimination</p>
            </div>
          </div>

          <div className="bg-gradient-to-br from-orange-500 to-orange-600 text-white p-4 rounded-lg">
            <h4 className="font-bold text-lg mb-2">4. MIND PUZZLE</h4>
            <p className="text-sm mb-3">Reconstituez une phrase à partir de mots</p>
            <div className="bg-white bg-opacity-20 p-2 rounded text-xs">
              <p>Compétence: Reconstruction</p>
            </div>
          </div>
        </div>
      )
    },

    // SLIDE 6: JEU 1 - PUZZLE DÉTAIL
    {
      title: "ÉTUDE TECHNIQUE",
      subtitle: "Jeu 1: PUZZLE - Logique Détaillée",
      time: "8:00 - 9:30",
      notes: "Le jeu Puzzle demande au joueur de classer les étapes d'une situation (comme organiser un événement) dans le bon ordre logique. Le système alterne entre différentes situations pour varier les difficultés.",
      content: (
        <div className="space-y-4 text-sm">
          <div className="bg-gradient-to-r from-blue-50 to-blue-100 border-l-4 border-blue-600 p-4 rounded">
            <p className="font-bold text-blue-900 mb-2">Concept:</p>
            <p className="text-blue-800">Situation: 'Organiser un événement'</p>
            <p className="text-blue-800">Étapes: ['Réserver salle', 'Envoyer invitations', 'Préparer logistique', 'Accueillir invités']</p>
          </div>

          <div className="bg-gray-50 p-3 rounded border border-gray-300">
            <p className="font-bold text-gray-900 mb-2">Code Logique:</p>
            <pre className="bg-gray-900 text-green-400 p-2 rounded text-xs overflow-x-auto">
{`function checkOrder(userOrder) {
  // userOrder = [3, 1, 2, 4] (ordre utilisateur)
  // correctOrder = [1, 2, 3, 4]
  
  return userOrder.every((step, index) => 
    step === correctOrder[index]
  );
}`}
            </pre>
          </div>

          <div className="bg-green-50 p-3 rounded border border-green-300">
            <p className="font-bold text-green-900 mb-2">Scoring:</p>
            <p className="text-green-800">+10 points si bon ordre | Tentatives illimitées</p>
          </div>
        </div>
      )
    },

    // SLIDE 7: JEU 2 - QUIZ DÉTAIL
    {
      title: "ÉTUDE TECHNIQUE",
      subtitle: "Jeu 2: QUIZ - Structure et Validation",
      time: "9:30 - 10:45",
      notes: "Le Quiz propose des questions à choix multiples stockées en JSON. Le système charge une question aléatoire, valide la réponse, et met à jour le score en temps réel avec session PHP.",
      content: (
        <div className="space-y-4 text-sm">
          <div className="bg-purple-50 p-3 rounded border border-purple-300">
            <p className="font-bold text-purple-900 mb-2">Format JSON:</p>
            <pre className="bg-gray-900 text-green-400 p-2 rounded text-xs overflow-x-auto">
{`{
  "question": "Qu'est-ce que la pensée critique?",
  "options": ["A", "B", "C", "D"],
  "correctAnswer": "B",
  "explanation": "..."
}`}
            </pre>
          </div>

          <div className="bg-gray-50 p-3 rounded border border-gray-300">
            <p className="font-bold text-gray-900 mb-2">Vérification:</p>
            <pre className="bg-gray-900 text-green-400 p-2 rounded text-xs">
{`$isCorrect = ($_POST['answer'] === 
             $question['correctAnswer']);`}
            </pre>
          </div>

          <div className="grid grid-cols-2 gap-2">
            <div className="bg-blue-50 p-2 rounded border border-blue-300">
              <p className="font-bold text-blue-900 text-xs">Session</p>
              <p className="text-xs text-blue-800">$_SESSION['score']++</p>
            </div>
            <div className="bg-orange-50 p-2 rounded border border-orange-300">
              <p className="font-bold text-orange-900 text-xs">Points</p>
              <p className="text-xs text-orange-800">+5 par bonne réponse</p>
            </div>
          </div>
        </div>
      )
    },

    // SLIDE 8: JEU 3 & 4
    {
      title: "ÉTUDE TECHNIQUE",
      subtitle: "Jeu 3: Fact or Fiction & Jeu 4: Mind Puzzle",
      time: "10:45 - 11:45",
      notes: "Le Fact or Fiction propose des affirmations vraies ou fausses que l'utilisateur doit valider. Le Mind Puzzle demande de reconstituer des phrases en plaçant les mots dans le bon ordre.",
      content: (
        <div className="grid grid-cols-2 gap-4 text-sm">
          <div className="space-y-3">
            <h4 className="font-bold text-green-900 bg-green-50 p-2 rounded">JEU 3: FACT OR FICTION</h4>
            <div className="bg-green-50 p-2 rounded border border-green-300">
              <p className="font-bold text-green-900 mb-1">Concept:</p>
              <p className="text-green-800 text-xs">Affirmation: "La Terre tourne autour du Soleil"</p>
              <p className="text-green-800 text-xs">Réponse: Vrai/Faux</p>
            </div>
            <div className="bg-gray-50 p-2 rounded border border-gray-300">
              <p className="font-bold text-gray-900 mb-1">Logique:</p>
              <pre className="text-xs bg-gray-900 text-green-400 p-1 rounded overflow-x-auto">
{`if (is_fact == userAnswer) {
  score += 10;
}`}
              </pre>
            </div>
          </div>

          <div className="space-y-3">
            <h4 className="font-bold text-orange-900 bg-orange-50 p-2 rounded">JEU 4: MIND PUZZLE</h4>
            <div className="bg-orange-50 p-2 rounded border border-orange-300">
              <p className="font-bold text-orange-900 mb-1">Concept:</p>
              <p className="text-orange-800 text-xs">Mots: ['la', 'pensée', 'développer', 'pour', 'important']</p>
              <p className="text-orange-800 text-xs">Réponse: "Développer la pensée pour..."</p>
            </div>
            <div className="bg-gray-50 p-2 rounded border border-gray-300">
              <p className="font-bold text-gray-900 mb-1">Validation:</p>
              <pre className="text-xs bg-gray-900 text-green-400 p-1 rounded">
{`wordOrder.join(' ') === 
  correctPhrase`}
              </pre>
            </div>
          </div>
        </div>
      )
    },

    // SLIDE 9: ARCHITECTURE BASE DE DONNÉES
    {
      title: "ÉTUDE TECHNIQUE",
      subtitle: "Architecture Base de Données",
      time: "11:45 - 12:45",
      notes: "Notre base de données est composée de 4 tables principales: Users pour l'authentification, Situations et Steps pour le Puzzle, et Questions pour le Quiz et Fact/Fiction.",
      content: (
        <div className="space-y-3 text-xs">
          <div className="grid grid-cols-2 gap-2">
            <div className="bg-blue-50 border-l-4 border-blue-600 p-2 rounded">
              <p className="font-bold text-blue-900">TABLE: users</p>
              <p className="text-blue-800">id, email, password (bcrypt)</p>
              <p className="text-blue-800">score, created_at</p>
            </div>
            <div className="bg-purple-50 border-l-4 border-purple-600 p-2 rounded">
              <p className="font-bold text-purple-900">TABLE: situations</p>
              <p className="text-purple-800">id, title, description</p>
              <p className="text-purple-800">game_type (puzzle)</p>
            </div>
            <div className="bg-green-50 border-l-4 border-green-600 p-2 rounded">
              <p className="font-bold text-green-900">TABLE: steps</p>
              <p className="text-green-800">id, situation_id, step_text</p>
              <p className="text-green-800">correct_order</p>
            </div>
            <div className="bg-orange-50 border-l-4 border-orange-600 p-2 rounded">
              <p className="font-bold text-orange-900">TABLE: questions</p>
              <p className="text-orange-800">id, question_text, options</p>
              <p className="text-orange-800">correct_answer, game_type</p>
            </div>
          </div>

          <div className="bg-gray-50 p-2 rounded border border-gray-300">
            <p className="font-bold text-gray-900 mb-1">Relations:</p>
            <p className="text-gray-800">users (1:N) steps | situations (1:N) steps</p>
          </div>
        </div>
      )
    },

    // SLIDE 10: SYSTÈME DE SÉCURITÉ
    {
      title: "ÉTUDE TECHNIQUE",
      subtitle: "Sécurité et Authentification",
      time: "12:45 - 13:30",
      notes: "La sécurité est primordiale. Nous utilisons bcrypt pour hasher les mots de passe, sessions PHP pour gérer les utilisateurs connectés, et validation des entrées pour prévenir les injections SQL.",
      content: (
        <div className="space-y-4 text-sm">
          <div className="bg-red-50 border-l-4 border-red-600 p-4 rounded">
            <p className="font-bold text-red-900 mb-2">1. HASHAGE BCRYPT</p>
            <pre className="bg-gray-900 text-green-400 p-2 rounded text-xs overflow-x-auto">
{`// Inscription
$hashedPassword = password_hash(
  $_POST['password'], 
  PASSWORD_BCRYPT
);`}
            </pre>
          </div>

          <div className="bg-orange-50 border-l-4 border-orange-600 p-4 rounded">
            <p className="font-bold text-orange-900 mb-2">2. VÉRIFICATION LOGIN</p>
            <pre className="bg-gray-900 text-green-400 p-2 rounded text-xs overflow-x-auto">
{`// Connexion
if (password_verify(
  $_POST['password'], 
  $user['password']
)) { /* succès */ }`}
            </pre>
          </div>

          <div className="bg-green-50 border-l-4 border-green-600 p-4 rounded">
            <p className="font-bold text-green-900 mb-2">3. SESSIONS SÉCURISÉES</p>
            <p className="text-green-800">$_SESSION utilisée pour garder l'utilisateur connecté</p>
            <p className="text-green-800 text-xs">Données stockées côté serveur, seulement ID en cookie</p>
          </div>
        </div>
      )
    },

    // SLIDE 11: AVANTAGES - PARTIE 1
    {
      title: "POURQUOI CHOISIR NOTRE SITE",
      subtitle: "Points Forts Pédagogiques",
      time: "13:30 - 14:45",
      notes: "Notre plateforme offre plusieurs avantages distinctifs. Elle combine ludification, apprentissage interactif, et progression mesurable pour maximiser l'engagement et l'efficacité pédagogique.",
      content: (
        <div className="space-y-3">
          <div className="bg-gradient-to-r from-blue-500 to-blue-600 text-white p-4 rounded-lg">
            <h3 className="font-bold text-lg mb-2">1. GAMIFICATION EFFECTIVE</h3>
            <p className="text-sm">Points, progression, feedback immédiat → Augmente la motivation</p>
          </div>

          <div className="bg-gradient-to-r from-purple-500 to-purple-600 text-white p-4 rounded-lg">
            <h3 className="font-bold text-lg mb-2">2. APPRENTISSAGE MULTISENSORIEL</h3>
            <p className="text-sm">4 types de jeux = 4 façons d'apprendre une compétence</p>
          </div>

          <div className="bg-gradient-to-r from-green-500 to-green-600 text-white p-4 rounded-lg">
            <h3 className="font-bold text-lg mb-2">3. PROGRESSION INDIVIDUALISÉE</h3>
            <p className="text-sm">Chaque utilisateur progresse à son rythme avec tracking</p>
          </div>

          <div className="bg-gradient-to-r from-orange-500 to-orange-600 text-white p-4 rounded-lg">
            <h3 className="font-bold text-lg mb-2">4. CONTENU ILLIMITÉ</h3>
            <p className="text-sm">Base de données extensible pour ajouter questions/situations</p>
          </div>
        </div>
      )
    },

    // SLIDE 12: AVANTAGES - PARTIE 2
    {
      title: "POURQUOI CHOISIR NOTRE SITE",
      subtitle: "Avantages Techniques et Commerciaux",
      time: "14:45 - 15:30",
      notes: "Techniquement, notre solution est scalable, sécurisée et facile à maintenir. Commercialement, elle peut s'adapter à différents contextes: éducation, entreprise, auto-apprentissage.",
      content: (
        <div className="grid grid-cols-2 gap-4">
          <div className="space-y-3">
            <h4 className="font-bold text-blue-900 bg-blue-50 p-2 rounded">AVANTAGES TECHNIQUES</h4>
            <div className="bg-blue-50 p-2 rounded border border-blue-300">
              <p className="text-sm text-blue-900">✓ Architecture MVC scalable</p>
              <p className="text-sm text-blue-900">✓ Base de données relationnelle</p>
              <p className="text-sm text-blue-900">✓ Authentification sécurisée</p>
              <p className="text-sm text-blue-900">✓ Sessions gérées côté serveur</p>
            </div>
          </div>

          <div className="space-y-3">
            <h4 className="font-bold text-purple-900 bg-purple-50 p-2 rounded">OPPORTUNITÉS COMMERCIALES</h4>
            <div className="bg-purple-50 p-2 rounded border border-purple-300">
              <p className="text-sm text-purple-900">✓ B2B: Écoles, universités</p>
              <p className="text-sm text-purple-900">✓ B2C: Abonnement individuel</p>
              <p className="text-sm text-purple-900">✓ Enterprise: Formation RH</p>
              <p className="text-sm text-purple-900">✓ API: Intégration tierce</p>
            </div>
          </div>
        </div>
      )
    },

    // SLIDE 13: COMPARATIF COMPÉTITIF
    {
      title: "POURQUOI CHOISIR NOTRE SITE",
      subtitle: "Positionnement Compétitif",
      time: "15:30 - 16:00",
      notes: "Comparé aux autres solutions du marché, Critical Thinking Games offre une combinaison unique: une véritable pensée critique (pas juste des quiz), 4 dimensions différentes, et une accessibilité complète.",
      content: (
        <div className="overflow-x-auto">
          <table className="w-full text-xs">
            <thead>
              <tr className="bg-gray-700 text-white">
                <th className="p-2 text-left">Critère</th>
                <th className="p-2 text-center">Notre Platform</th>
                <th className="p-2 text-center">Duolingo Style</th>
                <th className="p-2 text-center">Quiz Classique</th>
              </tr>
            </thead>
            <tbody>
              <tr className="border-b bg-green-50">
                <td className="p-2">Pensée Critique</td>
                <td className="p-2 text-center font-bold text-green-700">✓✓✓</td>
                <td className="p-2 text-center text-gray-600">✓</td>
                <td className="p-2 text-center text-gray-600">✗</td>
              </tr>
              <tr className="border-b">
                <td className="p-2">Gamification</td>
                <td className="p-2 text-center font-bold text-green-700">✓✓</td>
                <td className="p-2 text-center text-gray-600">✓✓✓</td>
                <td className="p-2 text-center text-gray-600">✗</td>
              </tr>
              <tr className="border-b">
                <td className="p-2">Variété Jeux</td>
                <td className="p-2 text-center font-bold text-green-700">4 types</td>
                <td className="p-2 text-center text-gray-600">1 type</td>
                <td className="p-2 text-center text-gray-600">1 type</td>
              </tr>
              <tr className="border-b">
                <td className="p-2">Accessibilité</td>
                <td className="p-2 text-center font-bold text-green-700">Web gratuit</td>
                <td className="p-2 text-center text-gray-600">App payante</td>
                <td className="p-2 text-center text-gray-600">Divers</td>
              </tr>
            </tbody>
          </table>
        </div>
      )
    },

    // SLIDE 14: CONCLUSION
    {
      title: "CONCLUSION",
      subtitle: "Récapitulatif et Impact",
      time: "16:00 - 17:30",
      notes: "En conclusion, Critical Thinking Games est une solution complète et innovante pour développer les compétences de pensée critique. Elle combine pédagogie, technologie, et accessibilité pour créer un impact réel.",
      content: (
        <div className="space-y-4">
          <div className="bg-gradient-to-r from-blue-600 to-purple-600 text-white p-6 rounded-lg">
            <h3 className="text-2xl font-bold mb-4">CE QUE NOUS AVONS CONSTRUIT</h3>
            <ul className="space-y-2 text-sm">
              <li>✓ Une plateforme web complète et sécurisée</li>
              <li>✓ 4 jeux distincts pour entraîner la pensée critique</li>
              <li>✓ Un système de progression et scoring</li>
              <li>✓ Une architecture scalable et maintenable</li>
            </ul>
          </div>

          <div className="grid grid-cols-3 gap-3">
            <div className="bg-blue-50 p-3 rounded border-2 border-blue-500 text-center">
              <p className="text-2xl font-bold text-blue-600">1000+</p>
              <p className="text-xs text-blue-800">Questions possibles</p>
            </div>
            <div className="bg-purple-50 p-3 rounded border-2 border-purple-500 text-center">
              <p className="text-2xl font-bold text-purple-600">∞</p>
              <p className="text-xs text-purple-800">Utilisateurs potentiels</p>
            </div>
            <div className="bg-green-50 p-3 rounded border-2 border-green-500 text-center">
              <p className="text-2xl font-bold text-green-600">4</p>
              <p className="text-xs text-green-800">Dimensions apprentissage</p>
            </div>
          </div>
        </div>
      )
    },

    // SLIDE 15: PERSPECTIVES FUTURES
    {
      title: "PERSPECTIVES",
      subtitle: "Évolutions Futures",
      time: "17:30 - 19:00",
      notes: "Nous avons des plans ambitieux pour l'avenir: interface mobile, IA pour personnaliser le contenu, leaderboards mondiaux, et intégrations avec les systèmes éducatifs existants.",
      content: (
        <div className="space-y-3">
          <div className="bg-blue-50 border-l-4 border-blue-600 p-4 rounded">
            <p className="font-bold text-blue-900 mb-2">COURT TERME (3-6 mois)</p>
            <ul className="text-sm text-blue-800 space-y-1">
              <li>• Responsive Design (Mobile)</li>
              <li>• API REST pour intégration tierce</li>
              <li>• Leaderboards utilisateurs</li>
            </ul>
          </div>

          <div className="bg-purple-50 border-l-4 border-purple-600 p-4 rounded">
            <p className="font-bold text-purple-900 mb-2">MOYEN TERME (6-12 mois)</p>
            <ul className="text-sm text-purple-800 space-y-1">
              <li>• IA: Questions générées dynamiquement</li>
              <li>• Analytics: Dashboard prof/admin</li>
              <li>• Difficulty Levels adaptatifs</li>
            </ul>
          </div>

          <div className="bg-green-50 border-l-4 border-green-600 p-4 rounded">
            <p className="font-bold text-green-900 mb-2">LONG TERME (12+ mois)</p>
            <ul className="text-sm text-green-800 space-y-1">
              <li>• Certification officielle</li>
              <li>• Partenariats éducatifs</li>
              <li>• Expansion internationale</li>
            </ul>
          </div>
        </div>
      )
    },

    // SLIDE 16: QUESTIONS ET CONTACT
    {
      title: "MERCI",
      subtitle: "Questions & Discussion",
      time: "19:00 - 20:00",
      notes: "Merci de votre attention. Nous sommes maintenant ouverts à vos questions et à vos retours. Critical Thinking Games est prêt à révolutionner la façon dont nous développons la pensée critique.",
      content: (
        <div className="text-center space-y-8">
          <div className="text-6xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
            MERCI!
          </div>

          <div className="space-y-6">
            <div className="bg-gray-50 p-6 rounded-lg border-2 border-gray-300">
              <p className="text-lg font-bold text-gray-900 mb-2">Questions?</p>
              <p className="text-gray-700">Nous sommes heureux de discuter de la plateforme, de son architecture, ou de comment l'intégrer dans votre contexte.</p>
            </div>

            <div className="grid grid-cols-3 gap-4">
              <div className="bg-blue-50 p-4 rounded-lg border border-blue-300">
                <p className="font-bold text-blue-900">Code</p>
                <p className="text-xs text-blue-800">GitHub: ITS-LUNAH</p>
              </div>
              <div className="bg-purple-50 p-4 rounded-lg border border-purple-300">
                <p className="font-bold text-purple-900">Documentation</p>
                <p className="text-xs text-purple-800">README complète</p>
              </div>
              <div className="bg-green-50 p-4 rounded-lg border border-green-300">
                <p className="font-bold text-green-900">Démo</p>
                <p className="text-xs text-green-800">Disponible en ligne</p>
              </div>
            </div>
          </div>

          <div className="mt-8 text-gray-600 text-sm">
            Durée totale: 20 minutes | Présenté avec passion 🚀
          </div>
        </div>
      )
    }
  ];

  const nextSlide = () => {
    if (currentSlide < slides.length - 1) {
      setCurrentSlide(currentSlide + 1);
    }
  };

  const prevSlide = () => {
    if (currentSlide > 0) {
      setCurrentSlide(currentSlide - 1);
    }
  };

  const goToSlide = (index) => {
    setCurrentSlide(index);
  };

  const currentSlideData = slides[currentSlide];

  return (
    <div className="min-h-screen bg-gradient-to-br from-gray-900 to-gray-800 p-4">
      <div className="max-w-7xl mx-auto">
        {/* Slide Principal */}
        <div className="bg-white rounded-lg shadow-2xl p-12 min-h-[600px] flex flex-col justify-between">
          {/* Header */}
          <div className="border-b-2 border-gray-200 pb-4 mb-6">
            <h1 className="text-4xl font-bold text-gray-900">{currentSlideData.title}</h1>
            <p className="text-xl text-gray-600 mt-2">{currentSlideData.subtitle}</p>
            <p className="text-sm text-gray-500 mt-2">⏱️ {currentSlideData.time}</p>
          </div>

          {/* Contenu */}
          <div className="flex-1 overflow-y-auto">
            {currentSlideData.content}
          </div>

          {/* Notes de présentation */}
          <div className="border-t-2 border-gray-200 pt-4 mt-6 bg-gray-50 p-4 rounded">
            <p className="text-sm font-bold text-gray-700 mb-2">📝 Notes de Présentation:</p>
            <p className="text-sm text-gray-700 leading-relaxed">{currentSlideData.notes}</p>
          </div>
        </div>

        {/* Navigation */}
        <div className="mt-8 flex items-center justify-between">
          <button
            onClick={prevSlide}
            disabled={currentSlide === 0}
            className="flex items-center gap-2 px-6 py-3 bg-gray-700 text-white rounded-lg hover:bg-gray-600 disabled:opacity-50 disabled:cursor-not-allowed transition"
          >
            <ChevronLeft size={20} />
            Précédent
          </button>

          <div className="flex gap-2 flex-wrap justify-center">
            {slides.map((_, index) => (
              <button
                key={index}
                onClick={() => goToSlide(index)}
                className={`w-10 h-10 rounded-lg font-bold transition ${
                  index === currentSlide
                    ? 'bg-blue-600 text-white'
                    : 'bg-gray-700 text-gray-300 hover:bg-gray-600'
                }`}
              >
                {index + 1}
              </button>
            ))}
          </div>

          <button
            onClick={nextSlide}
            disabled={currentSlide === slides.length - 1}
            className="flex items-center gap-2 px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 disabled:opacity-50 disabled:cursor-not-allowed transition"
          >
            Suivant
            <ChevronRight size={20} />
          </button>
        </div>

        {/* Indicateur de progression */}
        <div className="mt-4 text-center text-white">
          <p>Slide {currentSlide + 1} / {slides.length}</p>
          <div className="w-full bg-gray-700 rounded-full h-2 mt-2">
            <div
              className="bg-blue-600 h-2 rounded-full transition-all duration-300"
              style={{ width: `${((currentSlide + 1) / slides.length) * 100}%` }}
            ></div>
          </div>
        </div>

        {/* Info mode présentation */}
        <div className="mt-6 text-center text-gray-400 text-sm">
          💡 Utilisez les flèches du clavier ou les boutons pour naviguer. Chaque slide dure environ 1 à 2 minutes de présentation.
        </div>
      </div>
    </div>
  );
};

export default PresentationApp;
