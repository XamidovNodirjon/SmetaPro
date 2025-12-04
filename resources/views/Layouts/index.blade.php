<?php

import React, { useState } from 'react';
import { Plus, FileText, Download, Edit, Trash2, Eye, Calendar, DollarSign, Package, Settings, LogOut, User, Home, BarChart3, FileDown } from 'lucide-react';

export default function SmetaDashboard() {
  const [activeTab, setActiveTab] = useState('dashboard');
  const [showCreateModal, setShowCreateModal] = useState(false);
  const [projects, setProjects] = useState([
    {
      id: 1,
      name: "Yaşayış binosi loyihasi",
      category: "Qurilish",
      createdDate: "2024-12-01",
      totalCost: 850000000,
      status: "Tugallangan",
      items: 45
    },
    {
      id: 2,
      name: "Ofis binosi ta'miri",
      category: "Ta'mirlash",
      createdDate: "2024-11-28",
      totalCost: 320000000,
      status: "Jarayonda",
      items: 28
    }
  ]);

  const [formData, setFormData] = useState({
    projectName: '',
    category: '',
    subCategory: '',
    description: ''
  });

  const categories = [
    { name: 'Qurilish', subCategories: ['Yaşayış binolari', 'Tijorat binolari', 'Sanoat binolari'] },
    { name: "Ta'mirlash", subCategories: ['Ichki ta\'mir', 'Tashqi ta\'mir', 'Kommunikatsiya'] },
    { name: 'Yo\'l qurilishi', subCategories: ['Asfalt', 'Beton yo\'llar', 'Ko\'cha yo\'llari'] }
  ];

  const handleCreateProject = () => {
    if (projects.length >= 1) {
      alert('⚠️ Ikkinchi loyiha yaratish uchun premium tarifga o\'ting!');
      return;
    }
    
    if (formData.projectName && formData.category && formData.subCategory) {
      const newProject = {
        id: Date.now(),
        name: formData.projectName,
        category: formData.category,
        createdDate: new Date().toISOString().split('T')[0],
        totalCost: 0,
        status: 'Yangi',
        items: 0
      };
      setProjects([...projects, newProject]);
      setFormData({ projectName: '', category: '', subCategory: '', description: '' });
      setShowCreateModal(false);
    }
  };

  const formatCurrency = (amount) => {
    return new Intl.NumberFormat('uz-UZ').format(amount) + ' so\'m';
  };

  return (
    <div className="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50">
      {/* Sidebar */}
      <aside className="fixed left-0 top-0 h-full w-64 bg-white shadow-xl z-40 border-r border-gray-200">
        <div className="p-6">
          <div className="text-3xl font-black mb-8">
            <span className="text-blue-600">Smeta</span>
            <span className="text-emerald-600">.uz</span>
          </div>
          
          <nav className="space-y-2">
            <button
              onClick={() => setActiveTab('dashboard')}
              className={`w-full flex items-center gap-3 px-4 py-3 rounded-xl font-semibold transition ${
                activeTab === 'dashboard' 
                  ? 'bg-gradient-to-r from-blue-600 to-emerald-500 text-white shadow-lg' 
                  : 'text-gray-700 hover:bg-gray-100'
              }`}
            >
              <Home size={20} />
              <span>Dashboard</span>
            </button>
            
            <button
              onClick={() => setActiveTab('projects')}
              className={`w-full flex items-center gap-3 px-4 py-3 rounded-xl font-semibold transition ${
                activeTab === 'projects' 
                  ? 'bg-gradient-to-r from-blue-600 to-emerald-500 text-white shadow-lg' 
                  : 'text-gray-700 hover:bg-gray-100'
              }`}
            >
              <FileText size={20} />
              <span>Loyihalarim</span>
            </button>
            
            <button
              onClick={() => setActiveTab('statistics')}
              className={`w-full flex items-center gap-3 px-4 py-3 rounded-xl font-semibold transition ${
                activeTab === 'statistics' 
                  ? 'bg-gradient-to-r from-blue-600 to-emerald-500 text-white shadow-lg' 
                  : 'text-gray-700 hover:bg-gray-100'
              }`}
            >
              <BarChart3 size={20} />
              <span>Statistika</span>
            </button>
            
            <button
              onClick={() => setActiveTab('settings')}
              className={`w-full flex items-center gap-3 px-4 py-3 rounded-xl font-semibold transition ${
                activeTab === 'settings' 
                  ? 'bg-gradient-to-r from-blue-600 to-emerald-500 text-white shadow-lg' 
                  : 'text-gray-700 hover:bg-gray-100'
              }`}
            >
              <Settings size={20} />
              <span>Sozlamalar</span>
            </button>
          </nav>
        </div>

        <div className="absolute bottom-0 left-0 right-0 p-6 border-t border-gray-200">
          <div className="flex items-center gap-3 mb-4">
            <div className="w-10 h-10 bg-gradient-to-r from-blue-600 to-emerald-500 rounded-full flex items-center justify-center text-white font-bold">
              MN
            </div>
            <div>
              <div className="font-bold text-gray-800">Muhammadnabi</div>
              <div className="text-xs text-gray-500">Bepul tarif</div>
            </div>
          </div>
          <button className="w-full flex items-center justify-center gap-2 px-4 py-2 text-red-600 hover:bg-red-50 rounded-lg transition font-semibold">
            <LogOut size={18} />
            <span>Chiqish</span>
          </button>
        </div>
      </aside>

      {/* Main Content */}
      <main className="ml-64 p-8">
        {/* Header */}
        <header className="mb-8">
          <div className="flex justify-between items-center">
            <div>
              <h1 className="text-4xl font-black text-gray-900 mb-2">
                {activeTab === 'dashboard' && 'Dashboard'}
                {activeTab === 'projects' && 'Mening loyihalarim'}
                {activeTab === 'statistics' && 'Statistika'}
                {activeTab === 'settings' && 'Sozlamalar'}
              </h1>
              <p className="text-gray-600">Xush kelibsiz! Bugun yangi smeta yaratasizmi?</p>
            </div>
            
            {activeTab === 'projects' && (
              <button
                onClick={() => setShowCreateModal(true)}
                className="flex items-center gap-2 bg-gradient-to-r from-blue-600 to-emerald-500 text-white px-6 py-3 rounded-xl font-bold shadow-lg hover:shadow-xl transition hover:scale-105"
              >
                <Plus size={20} />
                <span>Yangi loyiha</span>
              </button>
            )}
          </div>
        </header>

        {/* Dashboard Content */}
        {activeTab === 'dashboard' && (
          <div className="space-y-8">
            {/* Stats Cards */}
            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
              <div className="bg-white rounded-2xl p-6 shadow-lg border border-gray-100 hover:shadow-xl transition">
                <div className="flex items-center justify-between mb-4">
                  <div className="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                    <FileText className="text-blue-600" size={24} />
                  </div>
                  <span className="text-xs font-semibold text-emerald-600 bg-emerald-50 px-3 py-1 rounded-full">+12%</span>
                </div>
                <div className="text-3xl font-black text-gray-900 mb-1">{projects.length}</div>
                <div className="text-gray-600 font-medium">Jami loyihalar</div>
              </div>

              <div className="bg-white rounded-2xl p-6 shadow-lg border border-gray-100 hover:shadow-xl transition">
                <div className="flex items-center justify-between mb-4">
                  <div className="w-12 h-12 bg-emerald-100 rounded-xl flex items-center justify-center">
                    <DollarSign className="text-emerald-600" size={24} />
                  </div>
                  <span className="text-xs font-semibold text-blue-600 bg-blue-50 px-3 py-1 rounded-full">Aktiv</span>
                </div>
                <div className="text-3xl font-black text-gray-900 mb-1">1.17 mlrd</div>
                <div className="text-gray-600 font-medium">Umumiy qiymat</div>
              </div>

              <div className="bg-white rounded-2xl p-6 shadow-lg border border-gray-100 hover:shadow-xl transition">
                <div className="flex items-center justify-between mb-4">
                  <div className="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                    <Package className="text-purple-600" size={24} />
                  </div>
                  <span className="text-xs font-semibold text-purple-600 bg-purple-50 px-3 py-1 rounded-full">Bepul</span>
                </div>
                <div className="text-3xl font-black text-gray-900 mb-1">1/1</div>
                <div className="text-gray-600 font-medium">Bepul loyiha limit</div>
              </div>

              <div className="bg-white rounded-2xl p-6 shadow-lg border border-gray-100 hover:shadow-xl transition">
                <div className="flex items-center justify-between mb-4">
                  <div className="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center">
                    <Calendar className="text-orange-600" size={24} />
                  </div>
                  <span className="text-xs font-semibold text-orange-600 bg-orange-50 px-3 py-1 rounded-full">Oxirgi</span>
                </div>
                <div className="text-3xl font-black text-gray-900 mb-1">2 kun</div>
                <div className="text-gray-600 font-medium">oldin yaratilgan</div>
              </div>
            </div>

            {/* Quick Actions */}
            <div className="bg-gradient-to-r from-blue-600 to-emerald-500 rounded-3xl p-8 text-white shadow-xl">
              <div className="flex flex-col md:flex-row items-center justify-between gap-6">
                <div>
                  <h2 className="text-3xl font-black mb-2">🎉 Premium tarifga o'ting!</h2>
                  <p className="text-lg opacity-90">Cheksiz loyihalar, kengaytirilgan hisobotlar va ko'proq imkoniyatlar</p>
                </div>
                <button className="bg-white text-blue-600 px-8 py-4 rounded-xl font-bold text-lg shadow-lg hover:shadow-2xl transition hover:scale-105 whitespace-nowrap">
                  Premium olish
                </button>
              </div>
            </div>

            {/* Recent Projects */}
            <div className="bg-white rounded-2xl p-8 shadow-lg border border-gray-100">
              <div className="flex justify-between items-center mb-6">
                <h2 className="text-2xl font-black text-gray-900">So'nggi loyihalar</h2>
                <button
                  onClick={() => setActiveTab('projects')}
                  className="text-blue-600 font-semibold hover:text-blue-700 transition"
                >
                  Barchasini ko'rish →
                </button>
              </div>
              
              <div className="space-y-4">
                {projects.slice(0, 3).map((project) => (
                  <div key={project.id} className="flex items-center justify-between p-5 bg-gray-50 rounded-xl hover:bg-gray-100 transition cursor-pointer border border-gray-200">
                    <div className="flex items-center gap-4">
                      <div className="w-12 h-12 bg-gradient-to-br from-blue-600 to-emerald-500 rounded-xl flex items-center justify-center text-white font-bold text-lg">
                        {project.name.charAt(0)}
                      </div>
                      <div>
                        <div className="font-bold text-gray-900">{project.name}</div>
                        <div className="text-sm text-gray-600">{project.category} • {project.items} element</div>
                      </div>
                    </div>
                    <div className="text-right">
                      <div className="font-bold text-gray-900">{formatCurrency(project.totalCost)}</div>
                      <div className={`text-xs font-semibold px-3 py-1 rounded-full inline-block mt-1 ${
                        project.status === 'Tugallangan' ? 'bg-emerald-100 text-emerald-700' : 'bg-blue-100 text-blue-700'
                      }`}>
                        {project.status}
                      </div>
                    </div>
                  </div>
                ))}
              </div>
            </div>
          </div>
        )}

        {/* Projects Tab */}
        {activeTab === 'projects' && (
          <div className="space-y-6">
            {projects.length === 0 ? (
              <div className="bg-white rounded-2xl p-16 shadow-lg text-center border border-gray-100">
                <div className="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                  <FileText className="text-gray-400" size={40} />
                </div>
                <h3 className="text-2xl font-black text-gray-900 mb-2">Hali loyihalar yo'q</h3>
                <p className="text-gray-600 mb-6">Birinchi smetangizni yaratish uchun "Yangi loyiha" tugmasini bosing</p>
                <button
                  onClick={() => setShowCreateModal(true)}
                  className="inline-flex items-center gap-2 bg-gradient-to-r from-blue-600 to-emerald-500 text-white px-8 py-4 rounded-xl font-bold shadow-lg hover:shadow-xl transition"
                >
                  <Plus size={20} />
                  <span>Yangi loyiha yaratish</span>
                </button>
              </div>
            ) : (
              <div className="grid grid-cols-1 lg:grid-cols-2 gap-6">
                {projects.map((project) => (
                  <div key={project.id} className="bg-white rounded-2xl p-6 shadow-lg border border-gray-100 hover:shadow-xl transition">
                    <div className="flex justify-between items-start mb-4">
                      <div>
                        <h3 className="text-xl font-bold text-gray-900 mb-2">{project.name}</h3>
                        <div className="flex items-center gap-2 text-sm text-gray-600">
                          <Calendar size={16} />
                          <span>{project.createdDate}</span>
                        </div>
                      </div>
                      <div className={`text-xs font-semibold px-3 py-1 rounded-full ${
                        project.status === 'Tugallangan' ? 'bg-emerald-100 text-emerald-700' : 
                        project.status === 'Jarayonda' ? 'bg-blue-100 text-blue-700' : 'bg-gray-100 text-gray-700'
                      }`}>
                        {project.status}
                      </div>
                    </div>

                    <div className="space-y-3 mb-6">
                      <div className="flex justify-between items-center">
                        <span className="text-gray-600">Kategoriya:</span>
                        <span className="font-semibold text-gray-900">{project.category}</span>
                      </div>
                      <div className="flex justify-between items-center">
                        <span className="text-gray-600">Elementlar:</span>
                        <span className="font-semibold text-gray-900">{project.items} ta</span>
                      </div>
                      <div className="flex justify-between items-center">
                        <span className="text-gray-600">Umumiy qiymat:</span>
                        <span className="font-bold text-emerald-600">{formatCurrency(project.totalCost)}</span>
                      </div>
                    </div>

                    <div className="flex gap-2">
                      <button className="flex-1 flex items-center justify-center gap-2 bg-blue-600 text-white px-4 py-3 rounded-xl font-semibold hover:bg-blue-700 transition">
                        <Eye size={18} />
                        <span>Ko'rish</span>
                      </button>
                      <button className="flex items-center justify-center gap-2 bg-emerald-600 text-white px-4 py-3 rounded-xl font-semibold hover:bg-emerald-700 transition">
                        <Download size={18} />
                      </button>
                      <button className="flex items-center justify-center gap-2 bg-orange-600 text-white px-4 py-3 rounded-xl font-semibold hover:bg-orange-700 transition">
                        <Edit size={18} />
                      </button>
                      <button className="flex items-center justify-center gap-2 bg-red-600 text-white px-4 py-3 rounded-xl font-semibold hover:bg-red-700 transition">
                        <Trash2 size={18} />
                      </button>
                    </div>
                  </div>
                ))}
              </div>
            )}
          </div>
        )}

        {/* Statistics Tab */}
        {activeTab === 'statistics' && (
          <div className="space-y-6">
            <div className="grid grid-cols-1 lg:grid-cols-2 gap-6">
              <div className="bg-white rounded-2xl p-8 shadow-lg border border-gray-100">
                <h3 className="text-xl font-bold text-gray-900 mb-6">Oylik statistika</h3>
                <div className="space-y-4">
                  <div className="flex justify-between items-center p-4 bg-blue-50 rounded-xl">
                    <span className="text-gray-700 font-medium">Dekabr 2024</span>
                    <span className="text-2xl font-black text-blue-600">2</span>
                  </div>
                  <div className="flex justify-between items-center p-4 bg-gray-50 rounded-xl">
                    <span className="text-gray-700 font-medium">Noyabr 2024</span>
                    <span className="text-2xl font-black text-gray-600">0</span>
                  </div>
                </div>
              </div>

              <div className="bg-white rounded-2xl p-8 shadow-lg border border-gray-100">
                <h3 className="text-xl font-bold text-gray-900 mb-6">Kategoriya bo'yicha</h3>
                <div className="space-y-4">
                  <div className="flex justify-between items-center p-4 bg-emerald-50 rounded-xl">
                    <span className="text-gray-700 font-medium">Qurilish</span>
                    <span className="text-2xl font-black text-emerald-600">1</span>
                  </div>
                  <div className="flex justify-between items-center p-4 bg-purple-50 rounded-xl">
                    <span className="text-gray-700 font-medium">Ta'mirlash</span>
                    <span className="text-2xl font-black text-purple-600">1</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        )}

        {/* Settings Tab */}
        {activeTab === 'settings' && (
          <div className="space-y-6">
            <div className="bg-white rounded-2xl p-8 shadow-lg border border-gray-100">
              <h3 className="text-xl font-bold text-gray-900 mb-6">Profil ma'lumotlari</h3>
              <div className="space-y-4">
                <div>
                  <label className="block text-sm font-semibold text-gray-700 mb-2">Ism</label>
                  <input type="text" defaultValue="Muhammadnabi" className="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:outline-none transition" />
                </div>
                <div>
                  <label className="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                  <input type="email" defaultValue="muhammadnabi@example.com" className="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:outline-none transition" />
                </div>
                <button className="bg-gradient-to-r from-blue-600 to-emerald-500 text-white px-8 py-3 rounded-xl font-bold shadow-lg hover:shadow-xl transition">
                  Saqlash
                </button>
              </div>
            </div>

            <div className="bg-white rounded-2xl p-8 shadow-lg border border-gray-100">
              <h3 className="text-xl font-bold text-gray-900 mb-6">Tarif rejasi</h3>
              <div className="flex items-center justify-between p-6 bg-gray-50 rounded-xl border-2 border-gray-200">
                <div>
                  <div className="text-2xl font-black text-gray-900 mb-1">Bepul tarif</div>
                  <div className="text-gray-600">1 ta bepul loyiha</div>
                </div>
                <button className="bg-gradient-to-r from-blue-600 to-emerald-500 text-white px-8 py-3 rounded-xl font-bold shadow-lg hover:shadow-xl transition">
                  Premium olish
                </button>
              </div>
            </div>
          </div>
        )}
      </main>

      {/* Create Project Modal */}
      {showCreateModal && (
        <div className="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
          <div className="bg-white rounded-3xl p-8 max-w-2xl w-full shadow-2xl">
            <div className="flex justify-between items-center mb-6">
              <h2 className="text-3xl font-black text-gray-900">Yangi loyiha yaratish</h2>
              <button
                onClick={() => setShowCreateModal(false)}
                className="text-gray-400 hover:text-gray-600 transition text-3xl font-bold"
              >
                ×
              </button>
            </div>

            {projects.length >= 1 && (
              <div className="bg-orange-50 border-2 border-orange-200 rounded-xl p-4 mb-6">
                <div className="flex items-start gap-3">
                  <span className="text-2xl">⚠️</span>
                  <div>
                    <div className="font-bold text-orange-900 mb-1">Bepul limit tugadi</div>
                    <div className="text-orange-800 text-sm">Ikkinchi loyiha yaratish uchun premium tarifga o'ting. Premium bilan cheksiz loyihalar yaratasiz!</div>
                  </div>
                </div>
              </div>
            )}

            <div className="space-y-5">
              <div>
                <label className="block text-sm font-bold text-gray-700 mb-2">Loyiha nomi *</label>
                <input
                  type="text"
                  value={formData.projectName}
                  onChange={(e) => setFormData({...formData, projectName: e.target.value})}
                  placeholder="Masalan: 5 qavatli turar-joy binosi"
                  className="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:outline-none transition"
                  disabled={projects.length >= 1}
                />
              </div>

              <div>
                <label className="block text-sm font-bold text-gray-700 mb-2">Kategoriya *</label>
                <select
                  value={formData.category}
                  onChange={(e) => setFormData({...formData, category: e.target.value, subCategory: ''})}
                  className="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:outline-none transition"
                  disabled={projects.length >= 1}
                >
                  <option value="">Kategoriyani tanlang</option>
                  {categories.map((cat) => (
                    <option key={cat.name} value={cat.name}>{cat.name}</option>
                  ))}
                </select>
              </div>

              {formData.category && (
                <div>
                  <label className="block text-sm font-bold text-gray-700 mb-2">Sub-kategoriya *</label>
                  <select
                    value={formData.subCategory}
                    onChange={(e) => setFormData({...formData, subCategory: e.target.value})}
                    className="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:outline-none transition"
                    disabled={projects.length >= 1}
                  >
                    <option value="">Sub-kategoriyani tanlang</option>
                    {categories.find(c => c.name === formData.category)?.subCategories.map((sub) => (
                      <option key={sub} value={sub}>{sub}</option>
                    ))}
                  </select>
                </div>
              )}

              <div>
                <label className="block text-sm font-bold text-gray-700 mb-2">Tavsif (ixtiyoriy)</label>
                <textarea
                  value={formData.description}
                  onChange={(e) => setFormData({...formData, description: e.target.value})}
                  placeholder="Loyiha haqida qo'shimcha ma'lumot..."
                  rows="4"
                  className="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:outline-none transition resize-none"
                  disabled={projects.length >= 1}
                />
              </div>

              <div className="flex gap-4 pt-4">
                <button
                  onClick={handleCreateProject}
                  disabled={projects.length >= 1}
                  className={`flex-1 py-4 rounded-xl font-bold text-lg transition ${
                    projects.length >= 1
                      ? 'bg-gray-300 text-gray-500 cursor-not-allowed'
                      : 'bg-gradient-to-r from-blue-600 to-emerald-500 text-white shadow-lg hover:shadow-xl hover:scale-105'
                  }`}
                >
                  {projects.length >= 1 ? 'Premium kerak' : 'Loyiha yaratish'}
                </button>
                <button
                  onClick={() => setShowCreateModal(false)}
                  className="px-8 py-4 border-2 border-gray-300 text-gray-700 rounded-xl font-bold hover:bg-gray-50 transition"
                >
                  Bekor qilish
                </button>
              </div>
            </div>
          </div>
        </div>
      )}
    </div>
  );
}