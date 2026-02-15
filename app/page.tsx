'use client';

import React, { useState } from 'react';

export default function EtudesTechnique() {
  const [currentPage, setCurrentPage] = useState(1);
  const [scale, setScale] = useState(100);

  const totalPages = 11;

  const pages = {
    1: {
      title: "Étude Technique Complète",
      subtitle: "Projet Critical Thinking",
      content: `
        <div style="text-align: center;">
          <h1 style="font-size: 3.5em; margin: 40px 0; color: white;">Étude Technique Complète</h1>
          <p style="font-size: 2.5em; margin: 30px 0; color: white;">Projet Critical Thinking</p>
          <p style="font-size: 1.3em; margin: 15px 0; color: rgba(255,255,255,0.9);">Analyse détaillée des 4 jeux pédagogiques</p>
          <p style="margin-top: 50px; font-size: 1.1em; color: rgba(255,255,255,0.85); line-height: 1.8;">
            Une présentation technique complète de l'architecture,<br>
            la logique métier et l'implémentation des jeux
          </p>
        </div>
      `,
      isCover: true
    },
    2: {
      title: "Table des matières",
      content: `
        <div class="toc">
          <h2>Table des matières</h2>
          <ol style="margin-left: 30px; line-height: 2;">
            <li><strong style="color: #667eea;">Introduction & Architecture Générale</strong></li>
            <li><strong style="color: #667eea;">Jeu 1: Challenge de Pensée Critique (Puzzle)</strong></li>
            <li><strong style="color: #667eea;">Jeu 2: Quiz de Pensée Critique</strong></li>
            <li><strong style="color: #667eea;">Jeu 3: Fait ou Fiction</strong></li>
            <li><strong style="color: #667eea;">Système d'Authentification</strong></li>
            <li><strong style="color: #667eea;">Gestion des Sessions & Scoring</strong></li>
            <li><strong style="color: #667eea;">Architecture Base de Données</strong></li>
            <li><strong style="color: #667eea;">Stack Technologique & Conclusion</strong></li>
          </ol>
        </div>
      `
    },
    3: {
      title: "Introduction & Architecture Générale",
      content: `
        <h1>Introduction & Architecture Générale</h1>
        
        <div class="learning-objective">
          <strong>Objectif:</strong> Comprendre l'architecture globale du projet et le fonctionnement de chaque jeu
        </div>

        <h2>Vue d'ensemble du projet</h2>
        
        <div class="intro-section">
          <h3>Qu'est-ce que Critical Thinking ?</h3>
          <p>
            Critical Thinking est une plateforme pédagogique interactive composée de 4 jeux différents,
            conçus pour développer les compétences de pensée critique chez les utilisateurs. Chaque jeu
            propose une approche unique pour améliorer le raisonnement, l'analyse et la prise de décision.
          </p>
        </div>

        <h2>Architecture Générale (MVC)</h2>
        <p>Le projet suit le pattern <strong>MVC (Model-View-Controller)</strong>:</p>

        <table>
          <thead>
            <tr>
              <th style="background: #667eea; color: white; padding: 12px;">Composant</th>
              <th style="background: #667eea; color: white; padding: 12px;">Description</th>
              <th style="background: #667eea; color: white; padding: 12px;">Responsabilité</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td style="padding: 12px; border-bottom: 1px solid #ecf0f1;"><strong>Model</strong></td>
              <td style="padding: 12px; border-bottom: 1px solid #ecf0f1;">Game.php, Question.php, User.php</td>
              <td style="padding: 12px; border-bottom: 1px solid #ecf0f1;">Gestion des données et logique métier</td>
            </tr>
            <tr style="background: #f8f9fa;">
              <td style="padding: 12px; border-bottom: 1px solid #ecf0f1;"><strong>View</strong></td>
              <td style="padding: 12px; border-bottom: 1px solid #ecf0f1;">Fichiers .php dans app/views</td>
              <td style="padding: 12px; border-bottom: 1px solid #ecf0f1;">Affichage de l'interface utilisateur</td>
            </tr>
            <tr>
              <td style="padding: 12px;"><strong>Controller</strong></td>
              <td style="padding: 12px;">GameController.php</td>
              <td style="padding: 12px;">Orchestration entre Model et View</td>
            </tr>
          </tbody>
        </table>

        <div style="background: #f8f9fa; padding: 20px; border: 2px solid #667eea; border-radius: 8px; margin: 20px 0; text-align: center; font-family: 'JetBrains Mono', monospace; line-height: 2;">
          <span style="display: inline-block; background: #667eea; color: white; padding: 10px 20px; margin: 5px; border-radius: 4px;">Utilisateur</span>
          <span style="color: #667eea; font-size: 1.5em; margin: 0 5px;">→</span>
          <span style="display: inline-block; background: #667eea; color: white; padding: 10px 20px; margin: 5px; border-radius: 4px;">Controller</span>
          <span style="color: #667eea; font-size: 1.5em; margin: 0 5px;">→</span>
          <span style="display: inline-block; background: #667eea; color: white; padding: 10px 20px; margin: 5px; border-radius: 4px;">Model</span>
          <span style="color: #667eea; font-size: 1.5em; margin: 0 5px;">→</span>
          <span style="display: inline-block; background: #667eea; color: white; padding: 10px 20px; margin: 5px; border-radius: 4px;">Database</span>
        </div>

        <h2>Les 4 Jeux du Projet</h2>
        <table>
          <thead>
            <tr>
              <th style="background: #667eea; color: white; padding: 12px;">Jeu</th>
              <th style="background: #667eea; color: white; padding: 12px;">Type</th>
              <th style="background: #667eea; color: white; padding: 12px;">Objectif</th>
              <th style="background: #667eea; color: white; padding: 12px;">Mécanique</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td style="padding: 12px; border-bottom: 1px solid #ecf0f1;"><strong>1. Puzzle</strong></td>
              <td style="padding: 12px; border-bottom: 1px solid #ecf0f1;">Ordonnancement</td>
              <td style="padding: 12px; border-bottom: 1px solid #ecf0f1;">Logique et organisation</td>
              <td style="padding: 12px; border-bottom: 1px solid #ecf0f1;">Classer des étapes dans le bon ordre</td>
            </tr>
            <tr style="background: #f8f9fa;">
              <td style="padding: 12px; border-bottom: 1px solid #ecf0f1;"><strong>2. Quiz</strong></td>
              <td style="padding: 12px; border-bottom: 1px solid #ecf0f1;">Choix multiple</td>
              <td style="padding: 12px; border-bottom: 1px solid #ecf0f1;">Connaissances en pensée critique</td>
              <td style="padding: 12px; border-bottom: 1px solid #ecf0f1;">Répondre à des questions à 4 options</td>
            </tr>
            <tr>
              <td style="padding: 12px; border-bottom: 1px solid #ecf0f1;"><strong>3. Fact/Fiction</strong></td>
              <td style="padding: 12px; border-bottom: 1px solid #ecf0f1;">Binaire</td>
              <td style="padding: 12px; border-bottom: 1px solid #ecf0f1;">Analyse critique et fact-checking</td>
              <td style="padding: 12px; border-bottom: 1px solid #ecf0f1;">Identifier les faits vrais des fictions</td>
            </tr>
            <tr style="background: #f8f9fa;">
              <td style="padding: 12px;"><strong>4. Mind Puzzle</strong></td>
              <td style="padding: 12px;">Déduction</td>
              <td style="padding: 12px;">Résolution de problèmes</td>
              <td style="padding: 12px;">Résoudre des énigmes logiques</td>
            </tr>
          </tbody>
        </table>
      `
    },
    4: {
      title: "Jeu 1: Challenge de Pensée Critique",
      content: `
        <h1>Jeu 1: Challenge de Pensée Critique</h1>
        
        <div class="learning-objective">
          <strong>Type:</strong> Jeu d'ordonnancement | <strong>Mécanique:</strong> Classer les étapes dans le bon ordre
        </div>

        <h2>Description du Jeu</h2>
        <div class="intro-section">
          <h3>Concept</h3>
          <p>
            L'utilisateur reçoit une situation (exemple: "Organiser un événement") avec plusieurs étapes
            présentées dans un ordre aléatoire. Son défi est de les reclasser dans le <strong>bon ordre logique</strong>.
          </p>
        </div>

        <h2>Logique Métier</h2>
        <h3>1. Charger une Situation Aléatoire</h3>
        
        <div style="background: #f0f3ff; border-left: 4px solid #667eea; padding: 15px; margin: 15px 0; border-radius: 4px;">
          <strong style="color: #667eea;">Fonction:</strong> getRandomSituation() | <strong style="color: #667eea;">Fichier:</strong> app/models/Game.php
        </div>

        <pre style="background: #2c3e50; color: #ecf0f1; padding: 20px; border-radius: 6px; overflow-x: auto; margin: 15px 0; font-family: 'JetBrains Mono', monospace; font-size: 0.85em; border-left: 4px solid #667eea;">
<span style="color: #e74c3c;">public function</span> <span style="color: #3498db;">getRandomSituation</span>() {
    <span style="color: #95a5a6;">// Récupère une situation aléatoire de la base de données</span>
    <span style="color: #95a5a6;">// MySQL utilise RAND() pour randomiser l'ordre</span>
    <span style="color: #e74c3c;">$stmt</span> = <span style="color: #e74c3c;">$this</span>-><span style="color: #3498db;">db</span>->query(
        <span style="color: #2ecc71;">"SELECT * FROM situations ORDER BY RAND() LIMIT 1"</span>
    );
    
    <span style="color: #e74c3c;">return</span> <span style="color: #e74c3c;">$stmt</span>->fetch();
}</pre>

        <div style="background: #f0f3ff; border-left: 4px solid #667eea; padding: 15px; margin: 15px 0; border-radius: 4px;">
          <strong style="color: #667eea;">Explication:</strong>
          <ul style="margin-left: 30px; margin-top: 10px;">
            <li style="margin: 8px 0;">Utilise RAND() de MySQL pour obtenir une situation aléatoire</li>
            <li style="margin: 8px 0;">LIMIT 1 récupère un seul résultat</li>
            <li style="margin: 8px 0;">Le résultat est un tableau associatif contenant id, titre, description</li>
          </ul>
        </div>

        <h3>2. Récupérer les Étapes Mélangées</h3>

        <pre style="background: #2c3e50; color: #ecf0f1; padding: 20px; border-radius: 6px; overflow-x: auto; margin: 15px 0; font-family: 'JetBrains Mono', monospace; font-size: 0.85em; border-left: 4px solid #667eea;">
<span style="color: #e74c3c;">public function</span> <span style="color: #3498db;">getStepsForSituation</span>(<span style="color: #e74c3c;">$situation_id</span>) {
    <span style="color: #95a5a6;">// Prépare la requête pour éviter les injections SQL</span>
    <span style="color: #e74c3c;">$stmt</span> = <span style="color: #e74c3c;">$this</span>-><span style="color: #3498db;">db</span>->prepare(
        <span style="color: #2ecc71;">"SELECT * FROM steps WHERE situation_id = ?"</span>
    );
    
    <span style="color: #95a5a6;">// Exécute la requête avec l'ID de la situation</span>
    <span style="color: #e74c3c;">$stmt</span>->execute([<span style="color: #e74c3c;">$situation_id</span>]);
    
    <span style="color: #95a5a6;">// Récupère tous les résultats</span>
    <span style="color: #e74c3c;">$steps</span> = <span style="color: #e74c3c;">$stmt</span>->fetchAll();
    
    <span style="color: #95a5a6;">// Mélange les étapes pour le jeu (ordre aléatoire)</span>
    <span style="color: #3498db;">shuffle</span>(<span style="color: #e74c3c;">$steps</span>);
    
    <span style="color: #e74c3c;">return</span> <span style="color: #e74c3c;">$steps</span>;
}</pre>

        <div style="background: #f0f3ff; border-left: 4px solid #667eea; padding: 15px; margin: 15px 0; border-radius: 4px;">
          <strong style="color: #667eea;">Points clés:</strong>
          <ul style="margin-left: 30px; margin-top: 10px;">
            <li style="margin: 8px 0;">Utilise prepare() et execute() pour sécuriser la requête</li>
            <li style="margin: 8px 0;">shuffle() mélange le tableau des étapes</li>
            <li style="margin: 8px 0;">Chaque situation possède plusieurs étapes avec un step_order</li>
          </ul>
        </div>
      `
    },
    5: {
      title: "Jeu 1: Vérification (suite)",
      content: `
        <h1>Jeu 1: Challenge de Pensée Critique (suite)</h1>

        <h2>3. Vérifier l'Ordre Soumis</h2>

        <pre style="background: #2c3e50; color: #ecf0f1; padding: 20px; border-radius: 6px; overflow-x: auto; margin: 15px 0; font-family: 'JetBrains Mono', monospace; font-size: 0.85em; border-left: 4px solid #667eea;">
<span style="color: #e74c3c;">public function</span> <span style="color: #3498db;">checkOrder</span>(<span style="color: #e74c3c;">$situation_id</span>, <span style="color: #e74c3c;">$user_order</span>) {
    <span style="color: #95a5a6;">// Récupère les bonnes étapes dans l'ordre correct</span>
    <span style="color: #e74c3c;">$stmt</span> = <span style="color: #e74c3c;">$this</span>-><span style="color: #3498db;">db</span>->prepare(
        <span style="color: #2ecc71;">"SELECT id, step_order FROM steps 
         WHERE situation_id = ? ORDER BY step_order ASC"</span>
    );
    <span style="color: #e74c3c;">$stmt</span>->execute([<span style="color: #e74c3c;">$situation_id</span>]);
    <span style="color: #e74c3c;">$correct_steps</span> = <span style="color: #e74c3c;">$stmt</span>->fetchAll();
    
    <span style="color: #e74c3c;">$is_correct</span> = <span style="color: #3498db;">true</span>;
    
    <span style="color: #95a5a6;">// Vérifie si chaque étape soumise correspond à la position correcte</span>
    <span style="color: #e74c3c;">foreach</span> (<span style="color: #e74c3c;">$correct_steps</span> <span style="color: #e74c3c;">as</span> <span style="color: #e74c3c;">$index</span> => <span style="color: #e74c3c;">$correct_step</span>) {
        <span style="color: #95a5a6;">// Compare l'ID soumis avec l'ID correct</span>
        <span style="color: #e74c3c;">if</span> (!isset(<span style="color: #e74c3c;">$user_order</span>[<span style="color: #e74c3c;">$index</span>]) || 
            <span style="color: #e74c3c;">$user_order</span>[<span style="color: #e74c3c;">$index</span>] != <span style="color: #e74c3c;">$correct_step</span>['id']) {
            <span style="color: #e74c3c;">$is_correct</span> = <span style="color: #3498db;">false</span>;
            <span style="color: #e74c3c;">break</span>;
        }
    }
    
    <span style="color: #e74c3c;">return</span> <span style="color: #e74c3c;">$is_correct</span>;
}</pre>

        <div style="background: #f0f3ff; border-left: 4px solid #667eea; padding: 15px; margin: 15px 0; border-radius: 4px;">
          <strong style="color: #667eea;">Algorithme de vérification:</strong>
          <ul style="margin-left: 30px; margin-top: 10px;">
            <li style="margin: 8px 0;">Récupère les étapes correctes triées par step_order</li>
            <li style="margin: 8px 0;">Compare chaque position de la réponse avec la position correcte</li>
            <li style="margin: 8px 0;">Retourne false dès qu'une erreur est détectée</li>
            <li style="margin: 8px 0;">Nécessite une correspondance exacte et dans le bon ordre</li>
          </ul>
        </div>

        <h2>Appel du Controller</h2>

        <pre style="background: #2c3e50; color: #ecf0f1; padding: 20px; border-radius: 6px; overflow-x: auto; margin: 15px 0; font-family: 'JetBrains Mono', monospace; font-size: 0.85em; border-left: 4px solid #667eea;">
<span style="color: #e74c3c;">public function</span> <span style="color: #3498db;">index</span>() {
    <span style="color: #95a5a6;">// Charge le modèle Game</span>
    <span style="color: #e74c3c;">$gameModel</span> = <span style="color: #e74c3c;">$this</span>->model(<span style="color: #2ecc71;">'Game'</span>);
    
    <span style="color: #95a5a6;">// Récupère une situation aléatoire</span>
    <span style="color: #e74c3c;">$situation</span> = <span style="color: #e74c3c;">$gameModel</span>-><span style="color: #3498db;">getRandomSituation</span>();
    
    <span style="color: #95a5a6;">// Récupère les étapes mélangées pour cette situation</span>
    <span style="color: #e74c3c;">$steps</span> = <span style="color: #e74c3c;">$gameModel</span>-><span style="color: #3498db;">getStepsForSituation</span>(<span style="color: #e74c3c;">$situation</span>['id']);
    
    <span style="color: #95a5a6;">// Passe les données à la vue</span>
    <span style="color: #e74c3c;">$this</span>->view(<span style="color: #2ecc71;">'game/index'</span>, [
        <span style="color: #2ecc71;">'situation'</span> => <span style="color: #e74c3c;">$situation</span>,
        <span style="color: #2ecc71;">'steps'</span> => <span style="color: #e74c3c;">$steps</span>
    ]);
}</pre>

        <h2>Flux du Jeu - Diagramme</h2>
        <div style="background: #f8f9fa; padding: 20px; border: 2px solid #667eea; border-radius: 8px; margin: 20px 0; text-align: center; font-family: 'JetBrains Mono', monospace; line-height: 2.5;">
          <div style="display: inline-block; background: #667eea; color: white; padding: 10px 20px; margin: 5px; border-radius: 4px;">Accès au jeu</div>
          <span style="color: #667eea; font-size: 1.5em; margin: 0 10px;">→</span>
          <div style="display: inline-block; background: #667eea; color: white; padding: 10px 20px; margin: 5px; border-radius: 4px;">Situation aléatoire</div>
          <br>
          <div style="display: inline-block; background: #667eea; color: white; padding: 10px 20px; margin: 5px; border-radius: 4px;">Étapes mélangées</div>
          <span style="color: #667eea; font-size: 1.5em; margin: 0 10px;">→</span>
          <div style="display: inline-block; background: #667eea; color: white; padding: 10px 20px; margin: 5px; border-radius: 4px;">Affichage</div>
          <br>
          <div style="display: inline-block; background: #667eea; color: white; padding: 10px 20px; margin: 5px; border-radius: 4px;">Soumission réponse</div>
          <span style="color: #667eea; font-size: 1.5em; margin: 0 10px;">→</span>
          <div style="display: inline-block; background: #667eea; color: white; padding: 10px 20px; margin: 5px; border-radius: 4px;">Vérification</div>
          <br>
          <div style="display: inline-block; background: #2ecc71; color: white; padding: 10px 20px; margin: 5px; border-radius: 4px;">Résultat</div>
        </div>
      `
    },
    6: {
      title: "Jeu 2: Quiz de Pensée Critique",
      content: `
        <h1>Jeu 2: Quiz de Pensée Critique</h1>
        
        <div class="learning-objective">
          <strong>Type:</strong> Choix multiple | <strong>Mécanique:</strong> Répondre à 4 options
        </div>

        <h2>Description du Jeu</h2>
        <div class="intro-section">
          <h3>Concept</h3>
          <p>
            L'utilisateur doit répondre à des questions de pensée critique avec 4 choix possibles.
            Chaque réponse correcte ajoute des points au score.
          </p>
        </div>

        <h2>Structure des Données JSON</h2>

        <pre style="background: #2c3e50; color: #ecf0f1; padding: 20px; border-radius: 6px; overflow-x: auto; margin: 15px 0; font-family: 'JetBrains Mono', monospace; font-size: 0.85em; border-left: 4px solid #667eea;">
{
  <span style="color: #2ecc71;">"questions"</span>: [
    {
      <span style="color: #2ecc71;">"id"</span>: <span style="color: #3498db;">1</span>,
      <span style="color: #2ecc71;">"question"</span>: <span style="color: #2ecc71;">"Quelle est la première étape..."</span>,
      <span style="color: #2ecc71;">"options"</span>: [
        <span style="color: #2ecc71;">"Option A"</span>,
        <span style="color: #2ecc71;">"Option B"</span>,
        <span style="color: #2ecc71;">"Option C"</span>,
        <span style="color: #2ecc71;">"Option D"</span>
      ],
      <span style="color: #2ecc71;">"correct_answer"</span>: <span style="color: #3498db;">0</span>,
      <span style="color: #2ecc71;">"explanation"</span>: <span style="color: #2ecc71;">"L'explication de la réponse..."</span>
    }
  ]
}</pre>

        <h2>Logique du Controller</h2>

        <pre style="background: #2c3e50; color: #ecf0f1; padding: 20px; border-radius: 6px; overflow-x: auto; margin: 15px 0; font-family: 'JetBrains Mono', monospace; font-size: 0.85em; border-left: 4px solid #667eea;">
<span style="color: #e74c3c;">public function</span> <span style="color: #3498db;">quiz</span>() {
    <span style="color: #95a5a6;">// Démarre la session</span>
    session_start();
    
    <span style="color: #95a5a6;">// Charge les questions depuis le JSON</span>
    <span style="color: #e74c3c;">$questions</span> = json_decode(
        file_get_contents(<span style="color: #2ecc71;">'data/questions.json'</span>), 
        <span style="color: #3498db;">true</span>
    );
    
    <span style="color: #95a5a6;">// Enregistre le score en session</span>
    <span style="color: #e74c3c;">$_SESSION</span>[<span style="color: #2ecc71;">'quiz_score'</span>] = <span style="color: #3498db;">0</span>;
    <span style="color: #e74c3c;">$_SESSION</span>[<span style="color: #2ecc71;">'current_question'</span>] = <span style="color: #3498db;">0</span>;
    
    <span style="color: #e74c3c;">$this</span>->view(<span style="color: #2ecc71;">'game/quiz'</span>, [
        <span style="color: #2ecc71;">'questions'</span> => <span style="color: #e74c3c;">$questions</span>
    ]);
}</pre>

        <h2>Gestion des Réponses</h2>

        <pre style="background: #2c3e50; color: #ecf0f1; padding: 20px; border-radius: 6px; overflow-x: auto; margin: 15px 0; font-family: 'JetBrains Mono', monospace; font-size: 0.85em; border-left: 4px solid #667eea;">
<span style="color: #e74c3c;">public function</span> <span style="color: #3498db;">submitAnswer</span>() {
    session_start();
    
    <span style="color: #95a5a6;">// Récupère la réponse POST</span>
    <span style="color: #e74c3c;">$user_answer</span> = <span style="color: #3498db;">$_POST</span>[<span style="color: #2ecc71;">'answer'</span>] ?? <span style="color: #3498db;">null</span>;
    <span style="color: #e74c3c;">$question_id</span> = <span style="color: #3498db;">$_POST</span>[<span style="color: #2ecc71;">'question_id'</span>];
    
    <span style="color: #95a5a6;">// Charge les questions</span>
    <span style="color: #e74c3c;">$questions</span> = json_decode(
        file_get_contents(<span style="color: #2ecc71;">'data/questions.json'</span>), 
        <span style="color: #3498db;">true</span>
    );
    
    <span style="color: #95a5a6;">// Compare la réponse avec la bonne réponse</span>
    <span style="color: #e74c3c;">$current_question</span> = <span style="color: #e74c3c;">$questions</span>[<span style="color: #e74c3c;">$question_id</span>];
    
    <span style="color: #e74c3c;">if</span> (<span style="color: #e74c3c;">$user_answer</span> == <span style="color: #e74c3c;">$current_question</span>[<span style="color: #2ecc71;">'correct_answer'</span>]) {
        <span style="color: #95a5a6;">// Bonne réponse: +10 points</span>
        <span style="color: #3498db;">$_SESSION</span>[<span style="color: #2ecc71;">'quiz_score'</span>] += <span style="color: #3498db;">10</span>;
    }
    
    <span style="color: #e74c3c;">return</span> json_encode([
        <span style="color: #2ecc71;">'correct'</span> => <span style="color: #e74c3c;">$user_answer</span> == <span style="color: #e74c3c;">$current_question</span>[<span style="color: #2ecc71;">'correct_answer'</span>],
        <span style="color: #2ecc71;">'explanation'</span> => <span style="color: #e74c3c;">$current_question</span>[<span style="color: #2ecc71;">'explanation'</span>],
        <span style="color: #2ecc71;">'score'</span> => <span style="color: #3498db;">$_SESSION</span>[<span style="color: #2ecc71;">'quiz_score'</span>]
    ]);
}</pre>
      `
    },
    7: {
      title: "Jeu 3: Fait ou Fiction",
      content: `
        <h1>Jeu 3: Fait ou Fiction</h1>
        
        <div class="learning-objective">
          <strong>Type:</strong> Binaire (Vrai/Faux) | <strong>Mécanique:</strong> Analyser des affirmations
        </div>

        <h2>Description du Jeu</h2>
        <div class="intro-section">
          <h3>Concept</h3>
          <p>
            L'utilisateur voit une affirmation et doit décider si elle est vraie ou fausse.
            C'est un exercice de fact-checking et d'analyse critique.
          </p>
        </div>

        <h2>Logique Binaire</h2>

        <pre style="background: #2c3e50; color: #ecf0f1; padding: 20px; border-radius: 6px; overflow-x: auto; margin: 15px 0; font-family: 'JetBrains Mono', monospace; font-size: 0.85em; border-left: 4px solid #667eea;">
<span style="color: #e74c3c;">public function</span> <span style="color: #3498db;">checkFact</span>(<span style="color: #e74c3c;">$statement_id</span>, <span style="color: #e74c3c;">$user_choice</span>) {
    <span style="color: #95a5a6;">// Récupère l'affirmation de la BD</span>
    <span style="color: #e74c3c;">$stmt</span> = <span style="color: #e74c3c;">$this</span>->db->prepare(
        <span style="color: #2ecc71;">"SELECT is_fact FROM statements WHERE id = ?"</span>
    );
    <span style="color: #e74c3c;">$stmt</span>->execute([<span style="color: #e74c3c;">$statement_id</span>]);
    <span style="color: #e74c3c;">$statement</span> = <span style="color: #e74c3c;">$stmt</span>->fetch();
    
    <span style="color: #95a5a6;">// Vérification simple: true == true ou false == false</span>
    <span style="color: #e74c3c;">$is_correct</span> = (<span style="color: #e74c3c;">$statement</span>[<span style="color: #2ecc71;">'is_fact'</span>] == <span style="color: #e74c3c;">$user_choice</span>);
    
    <span style="color: #e74c3c;">return</span> [
        <span style="color: #2ecc71;">'correct'</span> => <span style="color: #e74c3c;">$is_correct</span>,
        <span style="color: #2ecc71;">'actual_value'</span> => <span style="color: #e74c3c;">$statement</span>[<span style="color: #2ecc71;">'is_fact'</span>],
        <span style="color: #2ecc71;">'explanation'</span> => <span style="color: #e74c3c;">$statement</span>[<span style="color: #2ecc71;">'explanation'</span>]
    ];
}</pre>

        <div style="background: #f0f3ff; border-left: 4px solid #667eea; padding: 15px; margin: 15px 0; border-radius: 4px;">
          <strong style="color: #667eea;">Explication:</strong>
          <ul style="margin-left: 30px; margin-top: 10px;">
            <li style="margin: 8px 0;">is_fact = 1 pour vrai, 0 pour faux dans la base de données</li>
            <li style="margin: 8px 0;">user_choice = 1 ou 0 selon le choix de l'utilisateur</li>
            <li style="margin: 8px 0;">Comparaison directe: <code style="background: #f0f0f0; padding: 2px 6px; border-radius: 3px;">is_fact == user_choice</code></li>
            <li style="margin: 8px 0;">Retourne true seulement si les deux valeurs correspondent</li>
          </ul>
        </div>

        <h2>Exemples d'Affirmations</h2>

        <div style="background: #f8f9fa; padding: 20px; border-left: 4px solid #2ecc71; margin: 20px 0; border-radius: 8px;">
          <h3 style="color: #2ecc71; margin-top: 0;">✓ Affirmation VRAIE</h3>
          <p><strong>Énoncé:</strong> "La Terre tourne autour du Soleil"</p>
          <p><strong>is_fact:</strong> 1 (vrai)</p>
          <p><strong>Explication:</strong> C'est un fait scientifique établi depuis le 17e siècle</p>
        </div>

        <div style="background: #f8f9fa; padding: 20px; border-left: 4px solid #e74c3c; margin: 20px 0; border-radius: 8px;">
          <h3 style="color: #e74c3c; margin-top: 0;">✗ Affirmation FAUSSE</h3>
          <p><strong>Énoncé:</strong> "Le Soleil tourne autour de la Terre"</p>
          <p><strong>is_fact:</strong> 0 (faux)</p>
          <p><strong>Explication:</strong> C'est une conception ancienne réfutée par la science</p>
        </div>
      `
    },
    8: {
      title: "Système d'Authentification",
      content: `
        <h1>Système d'Authentification</h1>

        <h2>Processus d'Inscription (Signup)</h2>

        <pre style="background: #2c3e50; color: #ecf0f1; padding: 20px; border-radius: 6px; overflow-x: auto; margin: 15px 0; font-family: 'JetBrains Mono', monospace; font-size: 0.85em; border-left: 4px solid #667eea;">
<span style="color: #e74c3c;">public function</span> <span style="color: #3498db;">signup</span>() {
    <span style="color: #95a5a6;">// Récupère les données du formulaire</span>
    <span style="color: #e74c3c;">$email</span> = <span style="color: #3498db;">$_POST</span>[<span style="color: #2ecc71;">'email'</span>] ?? <span style="color: #3498db;">null</span>;
    <span style="color: #e74c3c;">$password</span> = <span style="color: #3498db;">$_POST</span>[<span style="color: #2ecc71;">'password'</span>] ?? <span style="color: #3498db;">null</span>;
    
    <span style="color: #95a5a6;">// Valide les entrées</span>
    <span style="color: #e74c3c;">if</span> (<span style="color: #3498db;">empty</span>(<span style="color: #e74c3c;">$email</span>) || <span style="color: #3498db;">empty</span>(<span style="color: #e74c3c;">$password</span>)) {
        <span style="color: #3498db;">die</span>(<span style="color: #2ecc71;">'Email et mot de passe requis'</span>);
    }
    
    <span style="color: #95a5a6;">// Vérifie si l'email existe déjà</span>
    <span style="color: #e74c3c;">$stmt</span> = <span style="color: #e74c3c;">$this</span>->db->prepare(
        <span style="color: #2ecc71;">"SELECT id FROM users WHERE email = ?"</span>
    );
    <span style="color: #e74c3c;">$stmt</span>->execute([<span style="color: #e74c3c;">$email</span>]);
    
    <span style="color: #e74c3c;">if</span> (<span style="color: #e74c3c;">$stmt</span>->rowCount() > <span style="color: #3498db;">0</span>) {
        <span style="color: #3498db;">die</span>(<span style="color: #2ecc71;">'Cet email existe déjà'</span>);
    }
    
    <span style="color: #95a5a6;">// Hache le mot de passe avec bcrypt</span>
    <span style="color: #e74c3c;">$hashed_password</span> = password_hash(<span style="color: #e74c3c;">$password</span>, PASSWORD_BCRYPT);
    
    <span style="color: #95a5a6;">// Insère l'utilisateur en base de données</span>
    <span style="color: #e74c3c;">$stmt</span> = <span style="color: #e74c3c;">$this</span>->db->prepare(
        <span style="color: #2ecc71;">"INSERT INTO users (email, password_hash) VALUES (?, ?)"</span>
    );
    <span style="color: #e74c3c;">$stmt</span>->execute([<span style="color: #e74c3c;">$email</span>, <span style="color: #e74c3c;">$hashed_password</span>]);
    
    <span style="color: #3498db;">header</span>(<span style="color: #2ecc71;">'Location: /login'</span>);
}</pre>

        <h2>Processus de Connexion (Login)</h2>

        <pre style="background: #2c3e50; color: #ecf0f1; padding: 20px; border-radius: 6px; overflow-x: auto; margin: 15px 0; font-family: 'JetBrains Mono', monospace; font-size: 0.85em; border-left: 4px solid #667eea;">
<span style="color: #e74c3c;">public function</span> <span style="color: #3498db;">login</span>() {
    <span style="color: #e74c3c;">$email</span> = <span style="color: #3498db;">$_POST</span>[<span style="color: #2ecc71;">'email'</span>] ?? <span style="color: #3498db;">null</span>;
    <span style="color: #e74c3c;">$password</span> = <span style="color: #3498db;">$_POST</span>[<span style="color: #2ecc71;">'password'</span>] ?? <span style="color: #3498db;">null</span>;
    
    <span style="color: #95a5a6;">// Cherche l'utilisateur par email</span>
    <span style="color: #e74c3c;">$stmt</span> = <span style="color: #e74c3c;">$this</span>->db->prepare(
        <span style="color: #2ecc71;">"SELECT id, password_hash FROM users WHERE email = ?"</span>
    );
    <span style="color: #e74c3c;">$stmt</span>->execute([<span style="color: #e74c3c;">$email</span>]);
    <span style="color: #e74c3c;">$user</span> = <span style="color: #e74c3c;">$stmt</span>->fetch();
    
    <span style="color: #95a5a6;">// Vérifie le mot de passe avec bcrypt</span>
    <span style="color: #e74c3c;">if</span> (<span style="color: #e74c3c;">$user</span> && password_verify(<span style="color: #e74c3c;">$password</span>, <span style="color: #e74c3c;">$user</span>[<span style="color: #2ecc71;">'password_hash'</span>])) {
        <span style="color: #95a5a6;">// Mot de passe correct: démarre la session</span>
        session_start();
        <span style="color: #3498db;">$_SESSION</span>[<span style="color: #2ecc71;">'user_id'</span>] = <span style="color: #e74c3c;">$user</span>[<span style="color: #2ecc71;">'id'</span>];
        <span style="color: #3498db;">$_SESSION</span>[<span style="color: #2ecc71;">'email'</span>] = <span style="color: #e74c3c;">$email</span>;
        
        <span style="color: #3498db;">header</span>(<span style="color: #2ecc71;">'Location: /dashboard'</span>);
    } <span style="color: #e74c3c;">else</span> {
        <span style="color: #3498db;">die</span>(<span style="color: #2ecc71;">'Email ou mot de passe incorrect'</span>);
    }
}</pre>

        <div style="background: #fff3cd; border-left: 4px solid #ffc107; padding: 15px; margin: 15px 0; border-radius: 4px;">
          <strong>Sécurité - Bcrypt:</strong>
          <ul style="margin-left: 30px; margin-top: 10px;">
            <li style="margin: 8px 0;">password_hash() crée un hash sécurisé avec salt</li>
            <li style="margin: 8px 0;">password_verify() compare le mot de passe saisi avec le hash stocké</li>
            <li style="margin: 8px 0;">Les mots de passe ne sont JAMAIS stockés en clair</li>
            <li style="margin: 8px 0;">Impossible de déduire le mot de passe original du hash</li>
          </ul>
        </div>
      `
    },
    9: {
      title: "Architecture Base de Données",
      content: `
        <h1>Architecture Base de Données</h1>

        <h2>Structure des 4 Tables Principales</h2>

        <h3>1. Table: users</h3>
        <pre style="background: #2c3e50; color: #ecf0f1; padding: 20px; border-radius: 6px; overflow-x: auto; margin: 15px 0; font-family: 'JetBrains Mono', monospace; font-size: 0.85em; border-left: 4px solid #667eea;">
<span style="color: #e74c3c;">CREATE TABLE</span> users (
    id <span style="color: #3498db;">INT</span> PRIMARY <span style="color: #e74c3c;">KEY</span> AUTO_INCREMENT,
    email <span style="color: #3498db;">VARCHAR</span>(<span style="color: #3498db;">255</span>) <span style="color: #e74c3c;">UNIQUE</span>,
    password_hash <span style="color: #3498db;">VARCHAR</span>(<span style="color: #3498db;">255</span>),
    score <span style="color: #3498db;">INT</span> <span style="color: #e74c3c;">DEFAULT</span> <span style="color: #3498db;">0</span>,
    created_at <span style="color: #3498db;">TIMESTAMP</span> <span style="color: #e74c3c;">DEFAULT</span> CURRENT_TIMESTAMP
);</pre>

        <h3>2. Table: situations (pour le Puzzle)</h3>
        <pre style="background: #2c3e50; color: #ecf0f1; padding: 20px; border-radius: 6px; overflow-x: auto; margin: 15px 0; font-family: 'JetBrains Mono', monospace; font-size: 0.85em; border-left: 4px solid #667eea;">
<span style="color: #e74c3c;">CREATE TABLE</span> situations (
    id <span style="color: #3498db;">INT</span> PRIMARY <span style="color: #e74c3c;">KEY</span> AUTO_INCREMENT,
    title <span style="color: #3498db;">VARCHAR</span>(<span style="color: #3498db;">255</span>),
    description <span style="color: #3498db;">TEXT</span>,
    difficulty <span style="color: #3498db;">ENUM</span>(<span style="color: #2ecc71;">'easy'</span>, <span style="color: #2ecc71;">'medium'</span>, <span style="color: #2ecc71;">'hard'</span>)
);</pre>

        <h3>3. Table: steps (pour les étapes du Puzzle)</h3>
        <pre style="background: #2c3e50; color: #ecf0f1; padding: 20px; border-radius: 6px; overflow-x: auto; margin: 15px 0; font-family: 'JetBrains Mono', monospace; font-size: 0.85em; border-left: 4px solid #667eea;">
<span style="color: #e74c3c;">CREATE TABLE</span> steps (
    id <span style="color: #3498db;">INT</span> PRIMARY <span style="color: #e74c3c;">KEY</span> AUTO_INCREMENT,
    situation_id <span style="color: #3498db;">INT</span> <span style="color: #e74c3c;">FOREIGN KEY</span> REFERENCES situations(id),
    description <span style="color: #3498db;">TEXT</span>,
    step_order <span style="color: #3498db;">INT</span>,
    <span style="color: #e74c3c;">UNIQUE</span>(situation_id, step_order)
);</pre>

        <h3>4. Table: questions (pour Quiz et Fact/Fiction)</h3>
        <pre style="background: #2c3e50; color: #ecf0f1; padding: 20px; border-radius: 6px; overflow-x: auto; margin: 15px 0; font-family: 'JetBrains Mono', monospace; font-size: 0.85em; border-left: 4px solid #667eea;">
<span style="color: #e74c3c;">CREATE TABLE</span> questions (
    id <span style="color: #3498db;">INT</span> PRIMARY <span style="color: #e74c3c;">KEY</span> AUTO_INCREMENT,
    question <span style="color: #3498db;">TEXT</span>,
    option_a <span style="color: #3498db;">VARCHAR</span>(<span style="color: #3498db;">255</span>),
    option_b <span style="color: #3498db;">VARCHAR</span>(<span style="color: #3498db;">255</span>),
    option_c <span style="color: #3498db;">VARCHAR</span>(<span style="color: #3498db;">255</span>),
    option_d <span style="color: #3498db;">VARCHAR</span>(<span style="color: #3498db;">255</span>),
    correct_answer <span style="color: #3498db;">INT</span>,
    explanation <span style="color: #3498db;">TEXT</span>,
    game_type <span style="color: #3498db;">ENUM</span>(<span style="color: #2ecc71;">'quiz'</span>, <span style="color: #2ecc71;">'fact_fiction'</span>)
);</pre>

        <h2>Diagramme des Relations</h2>
        <div style="background: #f8f9fa; padding: 20px; border: 2px solid #667eea; border-radius: 8px; margin: 20px 0; text-align: center; font-family: 'JetBrains Mono', monospace; line-height: 2.5;">
          <div style="display: inline-block; background: #667eea; color: white; padding: 10px 20px; margin: 5px; border-radius: 4px;">users</div>
          <br>
          <span style="color: #667eea;">↓ plays</span>
          <br>
          <div style="display: inline-block; background: #667eea; color: white; padding: 10px 20px; margin: 5px; border-radius: 4px;">situations</div>
          <span style="color: #667eea; margin: 0 10px;">→ has many</span>
          <div style="display: inline-block; background: #667eea; color: white; padding: 10px 20px; margin: 5px; border-radius: 4px;">steps</div>
          <br>
          <span style="color: #667eea;">questions (linked to users)</span>
        </div>
      `
    },
    10: {
      title: "Récapitulatif et Stack Technologique",
      content: `
        <h1>Tableau Récapitulatif des 4 Jeux</h1>

        <table style="width: 100%; border-collapse: collapse; margin: 20px 0;">
          <thead>
            <tr style="background: #667eea; color: white;">
              <th style="padding: 12px; text-align: left;">Jeu</th>
              <th style="padding: 12px; text-align: left;">Type</th>
              <th style="padding: 12px; text-align: left;">Logique Clé</th>
              <th style="padding: 12px; text-align: left;">Données</th>
            </tr>
          </thead>
          <tbody>
            <tr style="background: #f8f9fa;">
              <td style="padding: 12px; border-bottom: 1px solid #ecf0f1;"><strong>Puzzle</strong></td>
              <td style="padding: 12px; border-bottom: 1px solid #ecf0f1;">Ordonnancement</td>
              <td style="padding: 12px; border-bottom: 1px solid #ecf0f1;">shuffle() + checkOrder()</td>
              <td style="padding: 12px; border-bottom: 1px solid #ecf0f1;">situations, steps</td>
            </tr>
            <tr>
              <td style="padding: 12px; border-bottom: 1px solid #ecf0f1;"><strong>Quiz</strong></td>
              <td style="padding: 12px; border-bottom: 1px solid #ecf0f1;">Choix multiple</td>
              <td style="padding: 12px; border-bottom: 1px solid #ecf0f1;">submitAnswer() + scoring</td>
              <td style="padding: 12px; border-bottom: 1px solid #ecf0f1;">questions (JSON/BD)</td>
            </tr>
            <tr style="background: #f8f9fa;">
              <td style="padding: 12px; border-bottom: 1px solid #ecf0f1;"><strong>Fact/Fiction</strong></td>
              <td style="padding: 12px; border-bottom: 1px solid #ecf0f1;">Binaire</td>
              <td style="padding: 12px; border-bottom: 1px solid #ecf0f1;">is_fact == user_choice</td>
              <td style="padding: 12px; border-bottom: 1px solid #ecf0f1;">statements/questions</td>
            </tr>
            <tr>
              <td style="padding: 12px;"><strong>Mind Puzzle</strong></td>
              <td style="padding: 12px;">Déduction</td>
              <td style="padding: 12px;">Pattern matching</td>
              <td style="padding: 12px;">À implémenter</td>
            </tr>
          </tbody>
        </table>

        <h1 style="margin-top: 40px;">Stack Technologique</h1>

        <h2>Backend</h2>
        <ul style="margin-left: 30px; line-height: 2;">
          <li><strong>PHP 7.4+</strong> - Langage serveur</li>
          <li><strong>MySQL 5.7+</strong> - Base de données relationnelle</li>
          <li><strong>PDO</strong> - Accès aux données sécurisé</li>
          <li><strong>bcrypt</strong> - Hashage des mots de passe</li>
          <li><strong>Sessions PHP</strong> - Gestion des utilisateurs</li>
        </ul>

        <h2>Architecture</h2>
        <ul style="margin-left: 30px; line-height: 2;">
          <li><strong>Pattern MVC</strong> - Séparation des responsabilités</li>
          <li><strong>Controllers</strong> - Orchestration</li>
          <li><strong>Models</strong> - Logique métier et données</li>
          <li><strong>Views</strong> - Présentation</li>
        </ul>

        <h2>Sécurité</h2>
        <ul style="margin-left: 30px; line-height: 2;">
          <li>Requêtes préparées (prepare/execute) - Protection SQL injection</li>
          <li>password_hash() - Mots de passe hashés avec salt</li>
          <li>Validation des entrées utilisateur</li>
          <li>Sessions sécurisées</li>
        </ul>
      `
    },
    11: {
      title: "Conclusion",
      content: `
        <h1>Conclusion et Points Clés</h1>

        <h2>Points Clés Techniques</h2>

        <div style="background: #f0f3ff; border-left: 4px solid #667eea; padding: 15px; margin: 15px 0; border-radius: 4px;">
          <strong style="color: #667eea;">1. Approche MVC Complète</strong>
          <p style="margin-top: 10px;">Le projet suit une architecture bien définie avec séparation claire entre logique métier (Models), présentation (Views) et orchestration (Controllers).</p>
        </div>

        <div style="background: #f0f3ff; border-left: 4px solid #667eea; padding: 15px; margin: 15px 0; border-radius: 4px;">
          <strong style="color: #667eea;">2. Chaque Jeu Unique</strong>
          <p style="margin-top: 10px;">Chaque jeu possède sa propre logique métier adaptée à son type (ordonnancement, choix multiple, binaire, déduction).</p>
        </div>

        <div style="background: #f0f3ff; border-left: 4px solid #667eea; padding: 15px; margin: 15px 0; border-radius: 4px;">
          <strong style="color: #667eea;">3. Sécurité au Cœur</strong>
          <p style="margin-top: 10px;">Protection contre SQL injection, hashage des mots de passe, validation des entrées - tous les éléments de sécurité sont en place.</p>
        </div>

        <div style="background: #f0f3ff; border-left: 4px solid #667eea; padding: 15px; margin: 15px 0; border-radius: 4px;">
          <strong style="color: #667eea;">4. Scalabilité</strong>
          <p style="margin-top: 10px;">L'architecture permet d'ajouter facilement de nouveaux jeux, questions ou situations sans modifier le core du système.</p>
        </div>

        <h2>Améliorations Possibles</h2>
        <ul style="margin-left: 30px; line-height: 2;">
          <li>Implémenter le 4e jeu: Mind Puzzle Challenge</li>
          <li>Ajouter un système de leaderboard</li>
          <li>Implémenter une API REST</li>
          <li>Ajouter des tests unitaires</li>
          <li>Statistiques détaillées par utilisateur</li>
          <li>Système de badges et récompenses</li>
        </ul>

        <h2>Ressources Utilisées</h2>
        <ul style="margin-left: 30px; line-height: 2;">
          <li>PHP PDO - Documentation officielle</li>
          <li>MySQL - Gestion des bases de données</li>
          <li>Pattern MVC - Architecture logicielle</li>
          <li>bcrypt - Sécurité des mots de passe</li>
        </ul>

        <div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 30px; border-radius: 8px; margin-top: 40px; text-align: center;">
          <h3 style="color: white; margin-top: 0;">Fin de l'Étude Technique</h3>
          <p>Merci d'avoir suivi cette présentation complète sur l'architecture et la logique des 4 jeux du projet Critical Thinking!</p>
        </div>
      `
    }
  };

  const goToPage = (page: number) => {
    if (page >= 1 && page <= totalPages) {
      setCurrentPage(page);
    }
  };

  const currentPageContent = pages[currentPage as keyof typeof pages];

  return (
    <div style={{ minHeight: '100vh', background: '#f5f5f5', padding: '20px' }}>
      {/* Controls */}
      <div style={{
        position: 'fixed',
        top: 0,
        left: 0,
        right: 0,
        background: 'white',
        padding: '15px 20px',
        boxShadow: '0 2px 8px rgba(0,0,0,0.1)',
        zIndex: 100,
        display: 'flex',
        justifyContent: 'space-between',
        alignItems: 'center',
        gap: '20px'
      }}>
        <h2 style={{ margin: 0, color: '#667eea', fontSize: '1.3em' }}>
          Étude Technique - Projet Critical Thinking
        </h2>

        <div style={{ display: 'flex', gap: '15px', alignItems: 'center' }}>
          <button
            onClick={() => goToPage(currentPage - 1)}
            disabled={currentPage === 1}
            style={{
              padding: '10px 15px',
              background: currentPage === 1 ? '#ccc' : '#667eea',
              color: 'white',
              border: 'none',
              borderRadius: '4px',
              cursor: currentPage === 1 ? 'not-allowed' : 'pointer',
              fontSize: '0.9em'
            }}
          >
            ← Précédent
          </button>

          <span style={{ color: '#666', fontWeight: 'bold', minWidth: '80px', textAlign: 'center' }}>
            Page {currentPage} / {totalPages}
          </span>

          <button
            onClick={() => goToPage(currentPage + 1)}
            disabled={currentPage === totalPages}
            style={{
              padding: '10px 15px',
              background: currentPage === totalPages ? '#ccc' : '#667eea',
              color: 'white',
              border: 'none',
              borderRadius: '4px',
              cursor: currentPage === totalPages ? 'not-allowed' : 'pointer',
              fontSize: '0.9em'
            }}
          >
            Suivant →
          </button>

          <button
            onClick={() => window.print()}
            style={{
              padding: '10px 15px',
              background: '#764ba2',
              color: 'white',
              border: 'none',
              borderRadius: '4px',
              cursor: 'pointer',
              fontSize: '0.9em'
            }}
          >
            🖨️ Imprimer/PDF
          </button>

          <select
            value={scale}
            onChange={(e) => setScale(Number(e.target.value))}
            style={{
              padding: '8px 12px',
              border: '1px solid #ddd',
              borderRadius: '4px',
              fontSize: '0.9em'
            }}
          >
            <option value={80}>80%</option>
            <option value={100}>100%</option>
            <option value={120}>120%</option>
            <option value={150}>150%</option>
          </select>
        </div>
      </div>

      {/* Content Area */}
      <div style={{ marginTop: '80px', maxWidth: '1000px', margin: '80px auto 0' }}>
        <div
          style={{
            background: currentPageContent?.isCover 
              ? 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)'
              : 'white',
            padding: '60px',
            minHeight: '900px',
            boxShadow: '0 4px 12px rgba(0,0,0,0.15)',
            color: currentPageContent?.isCover ? 'white' : '#2c3e50',
            transform: `scale(${scale}%)`,
            transformOrigin: 'top center',
            transition: 'all 0.3s ease'
          }}
        >
          <div dangerouslySetInnerHTML={{ __html: currentPageContent?.content || '' }} />
        </div>
      </div>

      {/* Navigation Bottom */}
      <div style={{
        maxWidth: '1000px',
        margin: '30px auto',
        display: 'flex',
        gap: '10px',
        justifyContent: 'center',
        flexWrap: 'wrap'
      }}>
        {Array.from({ length: totalPages }, (_, i) => i + 1).map(page => (
          <button
            key={page}
            onClick={() => goToPage(page)}
            style={{
              padding: '8px 12px',
              background: currentPage === page ? '#667eea' : '#f0f0f0',
              color: currentPage === page ? 'white' : '#333',
              border: 'none',
              borderRadius: '4px',
              cursor: 'pointer',
              fontSize: '0.9em',
              fontWeight: currentPage === page ? 'bold' : 'normal'
            }}
          >
            {page}
          </button>
        ))}
      </div>
    </div>
  );
}
