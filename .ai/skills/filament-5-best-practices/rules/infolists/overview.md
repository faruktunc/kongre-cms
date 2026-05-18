> ## Documentation Index
> Fetch the complete documentation index at: https://filamentphp.com/docs/llms.txt
> Use this file to discover all available pages before exploring further.

# Overview

export const UtilityInjection = ({extras, except, set, version, children}) => {
  const parsedExtras = (extras ?? '').split('||').filter(extra => extra !== '').map(extra => {
    const [name, type, parameter, description] = extra.split(';;');
    return {
      name,
      type,
      parameter,
      description
    };
  });
  const utilitySets = {
    '5.x': {
      actions: [{
        name: 'Action',
        type: 'Filament\\Actions\\Action',
        parameter: '$action',
        description: 'The current action instance.'
      }, {
        name: 'Arguments',
        type: 'array<string, mixed>',
        parameter: '$arguments',
        description: 'The array of arguments passed to the action when it was triggered.'
      }, {
        name: 'Data',
        type: 'array<string, mixed>',
        parameter: '$data',
        description: "The array of data submitted from form fields in the action's modal. It will be empty before the modal form is submitted."
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'Eloquent model FQN',
        type: '?string<Illuminate\\Database\\Eloquent\\Model>',
        parameter: '$model',
        description: 'The Eloquent model FQN for the current action, if one is attached.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record for the current action, if one is attached.'
      }, {
        name: 'Selected Eloquent records',
        type: 'Illuminate\\Support\\Collection',
        parameter: '$selectedRecords',
        description: '[Bulk actions only] The Eloquent records selected in the table.'
      }, {
        name: 'Mounted actions',
        type: 'array<Filament\\Actions\\Action>',
        parameter: '$mountedActions',
        description: 'The array of actions that are currently mounted in the Livewire component. This is useful for accessing data from parent actions.'
      }, {
        name: 'Schema',
        type: 'Filament\\Schemas\\Schema',
        parameter: '$schema',
        description: '[Actions in schemas only] The schema object that this action belongs to.'
      }, {
        name: 'Schema component',
        type: 'Filament\\Schemas\\Components\\Component',
        parameter: '$schemaComponent',
        description: '[Actions in schemas only] The schema component that this action belongs to.'
      }, {
        name: 'Schema get function',
        type: 'Filament\\Schemas\\Components\\Utilities\\Get',
        parameter: '$schemaGet',
        description: '[Actions in schemas only] A function for retrieving values from the schema data. Validation is not run on form fields.'
      }, {
        name: 'Schema set function',
        type: 'Filament\\Schemas\\Components\\Utilities\\Set',
        parameter: '$schemaSet',
        description: '[Actions in schemas only] A function for setting values in the schema data.'
      }, {
        name: 'Schema component state',
        type: 'mixed',
        parameter: '$schemaComponentState',
        description: '[Actions in schemas only] The current value of the schema component.'
      }, {
        name: 'Schema operation',
        type: 'string',
        parameter: '$schemaOperation',
        description: '[Actions in schemas only] The current operation being performed by the schema. Usually <code>create</code>, <code>edit</code>, or <code>view</code>.'
      }, {
        name: 'Schema state',
        type: 'mixed',
        parameter: '$schemaState',
        description: '[Actions in schemas only] The current value of the schema that this action belongs to, like the current repeater item.'
      }, {
        name: 'Table',
        type: 'Filament\\Tables\\Table',
        parameter: '$table',
        description: '[Actions in tables only] The table object that this action belongs to.'
      }],
      actionGroups: [{
        name: 'Action group',
        type: 'Filament\\Actions\\ActionGroup',
        parameter: '$group',
        description: 'The current action group instance.'
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'Eloquent model FQN',
        type: '?string<Illuminate\\Database\\Eloquent\\Model>',
        parameter: '$model',
        description: 'The Eloquent model FQN for the current action group, if one is attached.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record for the current action group, if one is attached.'
      }, {
        name: 'Mounted actions',
        type: 'array<Filament\\Actions\\Action>',
        parameter: '$mountedActions',
        description: 'The array of actions that are currently mounted in the Livewire component. This is useful for accessing data from parent actions.'
      }, {
        name: 'Schema',
        type: 'Filament\\Schemas\\Schema',
        parameter: '$schema',
        description: '[Action groups in schemas only] The schema object that this action group belongs to.'
      }, {
        name: 'Schema component',
        type: 'Filament\\Schemas\\Components\\Component',
        parameter: '$schemaComponent',
        description: '[Action groups in schemas only] The schema component that this action group belongs to.'
      }, {
        name: 'Schema get function',
        type: 'Filament\\Schemas\\Components\\Utilities\\Get',
        parameter: '$schemaGet',
        description: '[Action groups in schemas only] A function for retrieving values from the schema data. Validation is not run on form fields.'
      }, {
        name: 'Schema component state',
        type: 'mixed',
        parameter: '$schemaComponentState',
        description: '[Action groups in schemas only] The current value of the schema component.'
      }, {
        name: 'Schema operation',
        type: 'string',
        parameter: '$schemaOperation',
        description: '[Action groups in schemas only] The current operation being performed by the schema. Usually <code>create</code>, <code>edit</code>, or <code>view</code>.'
      }, {
        name: 'Schema state',
        type: 'mixed',
        parameter: '$schemaState',
        description: '[Action groups in schemas only] The current value of the schema that this action group belongs to, like the current repeater item.'
      }, {
        name: 'Table',
        type: 'Filament\\Tables\\Table',
        parameter: '$table',
        description: '[Action groups in tables only] The table object that this action group belongs to.'
      }],
      formFields: [{
        name: 'Field',
        type: 'Filament\\Forms\\Components\\Field',
        parameter: '$component',
        description: 'The current field component instance.'
      }, {
        name: 'Get function',
        type: 'Filament\\Schemas\\Components\\Utilities\\Get',
        parameter: '$get',
        description: 'A function for retrieving values from the current form data. Validation is not run.'
      }, {
        name: 'Eloquent model FQN',
        type: '?string<Illuminate\\Database\\Eloquent\\Model>',
        parameter: '$model',
        description: 'The Eloquent model FQN for the current schema.'
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'Raw state',
        type: 'mixed',
        parameter: '$rawState',
        description: 'The current value of the field, before state casts were applied. Validation is not run.'
      }, {
        name: 'State',
        type: 'mixed',
        parameter: '$state',
        description: 'The current value of the field. Validation is not run.'
      }, {
        name: 'Operation',
        type: 'string',
        parameter: '$operation',
        description: 'The current operation being performed by the schema. Usually <code>create</code>, <code>edit</code>, or <code>view</code>.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record for the current schema.'
      }],
      exportColumns: [{
        name: 'Export column',
        type: 'Filament\\Actions\\Exports\\ExportColumn',
        parameter: '$column',
        description: 'The current export column instance.'
      }, {
        name: 'Exporter',
        type: '?Filament\\Actions\\Exports\\Exporter',
        parameter: '$exporter',
        description: 'The instance of the exporter class that is currently being used for exporting data.'
      }, {
        name: 'Options',
        type: 'array<string, mixed>',
        parameter: '$options',
        description: 'The options that were defined when the export started.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record that is currently being exported.'
      }],
      importColumns: [{
        name: 'Import column',
        type: 'Filament\\Actions\\Imports\\ImportColumn',
        parameter: '$column',
        description: 'The current import column instance.'
      }, {
        name: 'Data',
        type: 'array<string, mixed>',
        parameter: '$data',
        description: 'The processed data for the record that is currently being imported.'
      }, {
        name: 'Importer',
        type: '?Filament\\Actions\\Imports\\Importer',
        parameter: '$importer',
        description: 'The instance of the importer class that is currently being used for importing data.'
      }, {
        name: 'Options',
        type: 'array<string, mixed>',
        parameter: '$options',
        description: 'The options that were defined when the import started.'
      }, {
        name: 'Original data',
        type: 'array<string, mixed>',
        parameter: '$originalData',
        description: 'The original data for the record that is currently being imported, before it was processed.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record that is currently being imported.'
      }],
      infolistEntries: [{
        name: 'Entry',
        type: 'Filament\\Infolists\\Components\\Entry',
        parameter: '$component',
        description: 'The current entry component instance.'
      }, {
        name: 'Get function',
        type: 'Filament\\Schemas\\Components\\Utilities\\Get',
        parameter: '$get',
        description: 'A function for retrieving values from the current schema data. Validation is not run on form fields.'
      }, {
        name: 'Eloquent model FQN',
        type: '?string<Illuminate\\Database\\Eloquent\\Model>',
        parameter: '$model',
        description: 'The Eloquent model FQN for the current schema.'
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'State',
        type: 'mixed',
        parameter: '$state',
        description: 'The current value of the entry.'
      }, {
        name: 'Operation',
        type: 'string',
        parameter: '$operation',
        description: 'The current operation being performed by the schema. Usually <code>create</code>, <code>edit</code>, or <code>view</code>.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record for the current schema.'
      }],
      schemaComponents: [{
        name: 'Component',
        type: 'Filament\\Schemas\\Components\\Component',
        parameter: '$component',
        description: 'The current component instance.'
      }, {
        name: 'Get function',
        type: 'Filament\\Schemas\\Components\\Utilities\\Get',
        parameter: '$get',
        description: 'A function for retrieving values from the current schema data. Validation is not run on form fields.'
      }, {
        name: 'Eloquent model FQN',
        type: '?string<Illuminate\\Database\\Eloquent\\Model>',
        parameter: '$model',
        description: 'The Eloquent model FQN for the current schema.'
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'Operation',
        type: 'string',
        parameter: '$operation',
        description: 'The current operation being performed by the schema. Usually <code>create</code>, <code>edit</code>, or <code>view</code>.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record for the current schema.'
      }],
      tableColumns: [{
        name: 'Column',
        type: 'Filament\\Tables\\Columns\\Column',
        parameter: '$column',
        description: 'The current column instance.'
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'Row loop',
        type: 'stdClass',
        parameter: '$rowLoop',
        description: 'The <a href="https://laravel.com/docs/blade#the-loop-variable" target="_blank">row loop</a> object for the current table row.'
      }, {
        name: 'State',
        type: 'mixed',
        parameter: '$state',
        description: 'The current value of the column, based on the current table row.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record for the current table row.'
      }, {
        name: 'Table',
        type: 'Filament\\Tables\\Table',
        parameter: '$table',
        description: 'The current table instance.'
      }],
      tableFilters: [{
        name: 'Filter',
        type: 'Filament\\Tables\\Filters\\BaseFilter',
        parameter: '$filter',
        description: 'The current filter instance.'
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'Table',
        type: 'Filament\\Tables\\Table',
        parameter: '$table',
        description: 'The current table instance.'
      }]
    },
    '4.x': {
      actions: [{
        name: 'Action',
        type: 'Filament\\Actions\\Action',
        parameter: '$action',
        description: 'The current action instance.'
      }, {
        name: 'Arguments',
        type: 'array<string, mixed>',
        parameter: '$arguments',
        description: 'The array of arguments passed to the action when it was triggered.'
      }, {
        name: 'Data',
        type: 'array<string, mixed>',
        parameter: '$data',
        description: "The array of data submitted from form fields in the action's modal. It will be empty before the modal form is submitted."
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'Eloquent model FQN',
        type: '?string<Illuminate\\Database\\Eloquent\\Model>',
        parameter: '$model',
        description: 'The Eloquent model FQN for the current action, if one is attached.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record for the current action, if one is attached.'
      }, {
        name: 'Selected Eloquent records',
        type: 'Illuminate\\Support\\Collection',
        parameter: '$selectedRecords',
        description: '[Bulk actions only] The Eloquent records selected in the table.'
      }, {
        name: 'Mounted actions',
        type: 'array<Filament\\Actions\\Action>',
        parameter: '$mountedActions',
        description: 'The array of actions that are currently mounted in the Livewire component. This is useful for accessing data from parent actions.'
      }, {
        name: 'Schema',
        type: 'Filament\\Schemas\\Schema',
        parameter: '$schema',
        description: '[Actions in schemas only] The schema object that this action belongs to.'
      }, {
        name: 'Schema component',
        type: 'Filament\\Schemas\\Components\\Component',
        parameter: '$schemaComponent',
        description: '[Actions in schemas only] The schema component that this action belongs to.'
      }, {
        name: 'Schema get function',
        type: 'Filament\\Schemas\\Components\\Utilities\\Get',
        parameter: '$schemaGet',
        description: '[Actions in schemas only] A function for retrieving values from the schema data. Validation is not run on form fields.'
      }, {
        name: 'Schema set function',
        type: 'Filament\\Schemas\\Components\\Utilities\\Set',
        parameter: '$schemaSet',
        description: '[Actions in schemas only] A function for setting values in the schema data.'
      }, {
        name: 'Schema component state',
        type: 'mixed',
        parameter: '$schemaComponentState',
        description: '[Actions in schemas only] The current value of the schema component.'
      }, {
        name: 'Schema operation',
        type: 'string',
        parameter: '$schemaOperation',
        description: '[Actions in schemas only] The current operation being performed by the schema. Usually <code>create</code>, <code>edit</code>, or <code>view</code>.'
      }, {
        name: 'Schema state',
        type: 'mixed',
        parameter: '$schemaState',
        description: '[Actions in schemas only] The current value of the schema that this action belongs to, like the current repeater item.'
      }, {
        name: 'Table',
        type: 'Filament\\Tables\\Table',
        parameter: '$table',
        description: '[Actions in tables only] The table object that this action belongs to.'
      }],
      actionGroups: [{
        name: 'Action group',
        type: 'Filament\\Actions\\ActionGroup',
        parameter: '$group',
        description: 'The current action group instance.'
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'Eloquent model FQN',
        type: '?string<Illuminate\\Database\\Eloquent\\Model>',
        parameter: '$model',
        description: 'The Eloquent model FQN for the current action group, if one is attached.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record for the current action group, if one is attached.'
      }, {
        name: 'Mounted actions',
        type: 'array<Filament\\Actions\\Action>',
        parameter: '$mountedActions',
        description: 'The array of actions that are currently mounted in the Livewire component. This is useful for accessing data from parent actions.'
      }, {
        name: 'Schema',
        type: 'Filament\\Schemas\\Schema',
        parameter: '$schema',
        description: '[Action groups in schemas only] The schema object that this action group belongs to.'
      }, {
        name: 'Schema component',
        type: 'Filament\\Schemas\\Components\\Component',
        parameter: '$schemaComponent',
        description: '[Action groups in schemas only] The schema component that this action group belongs to.'
      }, {
        name: 'Schema get function',
        type: 'Filament\\Schemas\\Components\\Utilities\\Get',
        parameter: '$schemaGet',
        description: '[Action groups in schemas only] A function for retrieving values from the schema data. Validation is not run on form fields.'
      }, {
        name: 'Schema component state',
        type: 'mixed',
        parameter: '$schemaComponentState',
        description: '[Action groups in schemas only] The current value of the schema component.'
      }, {
        name: 'Schema operation',
        type: 'string',
        parameter: '$schemaOperation',
        description: '[Action groups in schemas only] The current operation being performed by the schema. Usually <code>create</code>, <code>edit</code>, or <code>view</code>.'
      }, {
        name: 'Schema state',
        type: 'mixed',
        parameter: '$schemaState',
        description: '[Action groups in schemas only] The current value of the schema that this action belongs to, like the current repeater item.'
      }, {
        name: 'Table',
        type: 'Filament\\Tables\\Table',
        parameter: '$table',
        description: '[Action groups in tables only] The table object that this action group belongs to.'
      }],
      formFields: [{
        name: 'Field',
        type: 'Filament\\Forms\\Components\\Field',
        parameter: '$component',
        description: 'The current field component instance.'
      }, {
        name: 'Get function',
        type: 'Filament\\Schemas\\Components\\Utilities\\Get',
        parameter: '$get',
        description: 'A function for retrieving values from the current form data. Validation is not run.'
      }, {
        name: 'Eloquent model FQN',
        type: '?string<Illuminate\\Database\\Eloquent\\Model>',
        parameter: '$model',
        description: 'The Eloquent model FQN for the current schema.'
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'Raw state',
        type: 'mixed',
        parameter: '$rawState',
        description: 'The current value of the field, before state casts were applied. Validation is not run.'
      }, {
        name: 'State',
        type: 'mixed',
        parameter: '$state',
        description: 'The current value of the field. Validation is not run.'
      }, {
        name: 'Operation',
        type: 'string',
        parameter: '$operation',
        description: 'The current operation being performed by the schema. Usually <code>create</code>, <code>edit</code>, or <code>view</code>.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record for the current schema.'
      }],
      exportColumns: [{
        name: 'Export column',
        type: 'Filament\\Actions\\Exports\\ExportColumn',
        parameter: '$column',
        description: 'The current export column instance.'
      }, {
        name: 'Exporter',
        type: '?Filament\\Actions\\Exports\\Exporter',
        parameter: '$exporter',
        description: 'The instance of the exporter class that is currently being used for exporting data.'
      }, {
        name: 'Options',
        type: 'array<string, mixed>',
        parameter: '$options',
        description: 'The options that were defined when the export started.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record that is currently being exported.'
      }],
      importColumns: [{
        name: 'Import column',
        type: 'Filament\\Actions\\Imports\\ImportColumn',
        parameter: '$column',
        description: 'The current import column instance.'
      }, {
        name: 'Data',
        type: 'array<string, mixed>',
        parameter: '$data',
        description: 'The processed data for the record that is currently being imported.'
      }, {
        name: 'Importer',
        type: '?Filament\\Actions\\Imports\\Importer',
        parameter: '$importer',
        description: 'The instance of the importer class that is currently being used for importing data.'
      }, {
        name: 'Options',
        type: 'array<string, mixed>',
        parameter: '$options',
        description: 'The options that were defined when the import started.'
      }, {
        name: 'Original data',
        type: 'array<string, mixed>',
        parameter: '$originalData',
        description: 'The original data for the record that is currently being imported, before it was processed.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record that is currently being imported.'
      }],
      infolistEntries: [{
        name: 'Entry',
        type: 'Filament\\Infolists\\Components\\Entry',
        parameter: '$component',
        description: 'The current entry component instance.'
      }, {
        name: 'Get function',
        type: 'Filament\\Schemas\\Components\\Utilities\\Get',
        parameter: '$get',
        description: 'A function for retrieving values from the current schema data. Validation is not run on form fields.'
      }, {
        name: 'Eloquent model FQN',
        type: '?string<Illuminate\\Database\\Eloquent\\Model>',
        parameter: '$model',
        description: 'The Eloquent model FQN for the current schema.'
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'State',
        type: 'mixed',
        parameter: '$state',
        description: 'The current value of the entry.'
      }, {
        name: 'Operation',
        type: 'string',
        parameter: '$operation',
        description: 'The current operation being performed by the schema. Usually <code>create</code>, <code>edit</code>, or <code>view</code>.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record for the current schema.'
      }],
      schemaComponents: [{
        name: 'Component',
        type: 'Filament\\Schemas\\Components\\Component',
        parameter: '$component',
        description: 'The current component instance.'
      }, {
        name: 'Get function',
        type: 'Filament\\Schemas\\Components\\Utilities\\Get',
        parameter: '$get',
        description: 'A function for retrieving values from the current schema data. Validation is not run on form fields.'
      }, {
        name: 'Eloquent model FQN',
        type: '?string<Illuminate\\Database\\Eloquent\\Model>',
        parameter: '$model',
        description: 'The Eloquent model FQN for the current schema.'
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'Operation',
        type: 'string',
        parameter: '$operation',
        description: 'The current operation being performed by the schema. Usually <code>create</code>, <code>edit</code>, or <code>view</code>.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record for the current schema.'
      }],
      tableColumns: [{
        name: 'Column',
        type: 'Filament\\Tables\\Columns\\Column',
        parameter: '$column',
        description: 'The current column instance.'
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'Row loop',
        type: 'stdClass',
        parameter: '$rowLoop',
        description: 'The <a href="https://laravel.com/docs/blade#the-loop-variable" target="_blank">row loop</a> object for the current table row.'
      }, {
        name: 'State',
        type: 'mixed',
        parameter: '$state',
        description: 'The current value of the column, based on the current table row.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record for the current table row.'
      }, {
        name: 'Table',
        type: 'Filament\\Tables\\Table',
        parameter: '$table',
        description: 'The current table instance.'
      }],
      tableFilters: [{
        name: 'Filter',
        type: 'Filament\\Tables\\Filters\\BaseFilter',
        parameter: '$filter',
        description: 'The current filter instance.'
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'Table',
        type: 'Filament\\Tables\\Table',
        parameter: '$table',
        description: 'The current table instance.'
      }]
    }
  };
  const baseUtilities = utilitySets[version]?.[set] || [];
  let utilities = [...parsedExtras, ...baseUtilities].sort((a, b) => a.parameter > b.parameter ? 1 : -1);
  utilities = Array.from(new Map(utilities.map(utility => [utility.parameter, utility])).values());
  const exceptList = (except ?? '').split('||');
  utilities = utilities.filter(utility => !exceptList.includes(utility.parameter));
  const links = {
    actions: `/${version}/actions/overview#action-utility-injection`,
    actionGroups: `/${version}/actions/overview#action-utility-injection`,
    formFields: `/${version}/forms/overview#field-utility-injection`,
    infolistEntries: `/${version}/infolists/overview#entry-utility-injection`,
    schemaComponents: `/${version}/schemas/overview#component-utility-injection`,
    tableColumns: `/${version}/tables/columns/overview#column-utility-injection`,
    tableFilters: `/${version}/tables/filters/overview#filter-utility-injection`
  };
  const link = links[set] ?? null;
  const parseInlineCode = text => {
    if (typeof text !== 'string') return text;
    const parts = text.split(/(`[^`]+`)/);
    return parts.map((part, i) => {
      if (part.startsWith('`') && part.endsWith('`')) {
        return <code key={i} className="rounded bg-gray-100 px-1 py-0.5 font-mono text-xs dark:bg-white/10">
            {part.slice(1, -1)}
          </code>;
      }
      return part;
    });
  };
  return <details className="border-standard mt-4 rounded-xl">
      <summary className="not-prose flex w-full cursor-pointer list-none flex-row content-center items-start rounded-t-xl rounded-b-xl px-3.5 py-3 text-sm text-gray-600 hover:bg-white/20 hover:text-gray-900 dark:text-gray-300 dark:hover:bg-white/5 dark:hover:text-gray-200 [&::-webkit-details-marker]:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" className="mt-0.5 h-3.5 w-3.5 shrink-0 text-gray-400 transition-transform">
          <path d="m9 18 6-6-6-6" />
        </svg>

        <div className="ml-2 text-left leading-tight">
          {parseInlineCode(children)}
        </div>
      </summary>

      <div className="border-t border-gray-200 px-5 py-3 dark:border-white/10">
        {link && <p className="text-sm">
            <a href={link} target="_blank">
              Learn more about utility injection.
            </a>
          </p>}

        {utilities.map((utility, index) => <div key={index} className="border-b border-gray-200 py-3 last:border-b-0 dark:border-white/10">
            <div className="flex flex-wrap items-center gap-1.5 text-sm">
              <div>{utility.name}</div>
              <div className="text-primary dark:text-primary-light font-semibold">
                {utility.parameter}
              </div>
              <div className="rounded bg-gray-100 px-1.5 py-0.5 font-mono text-xs text-gray-500 dark:bg-white/10 dark:text-gray-400">
                {utility.type}
              </div>
            </div>
            <div className="mt-1.5 text-sm text-gray-600 dark:text-gray-400" dangerouslySetInnerHTML={{
    __html: utility.description
  }} />
          </div>)}
      </div>
    </details>;
};

export const AutoScreenshot = ({name, alt, version}) => {
  const [loaded, setLoaded] = useState(false);
  return <div className="not-prose border-standard relative mt-4 min-h-10 rounded-2xl">
      <div className={`absolute inset-0 flex items-center px-3.5 py-3 transition-opacity ${loaded ? 'opacity-0' : 'opacity-100'}`}>
        <svg className="h-4 w-4 animate-spin text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
          <circle className="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" strokeWidth="4" />
          <path className="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z" />
        </svg>
        <span className="ml-2 text-sm text-gray-600 dark:text-gray-300">
          Loading preview
        </span>
      </div>

      <img src={`/docs/images/${version}/light/${name}.jpg`} alt={alt} loading="lazy" decoding="async" onLoad={() => setLoaded(true)} className={`rounded-2xl transition-opacity dark:hidden ${loaded ? 'opacity-100' : 'opacity-0'}`} />

      <img src={`/docs/images/${version}/dark/${name}.jpg`} alt={alt} loading="lazy" decoding="async" onLoad={() => setLoaded(true)} className={`hidden rounded-2xl transition-opacity dark:block ${loaded ? 'opacity-100' : 'opacity-0'}`} />
    </div>;
};

export const EditOnGitHub = ({version, path}) => {
  const url = `https://github.com/filamentphp/filament/edit/${version}/${path}`;
  return <div className="not-prose mt-16">
      <a href={url} target="_blank" rel="noopener noreferrer" className="inline-flex items-center gap-2 text-sm text-gray-500 transition hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" className="h-4 w-4">
          <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z" />
        </svg>
        Edit this page on GitHub
      </a>
    </div>;
};

export const Footer = () => {
  const sponsorsByTier = JSON.parse(`{
  "agency_partner": [
    {
      "name": "Kirschbaum",
      "url": "https://kirschbaumdevelopment.com/solutions/filament-development",
      "filename": "kirschbaum.svg"
    }
  ],
  "gold": [
    {
      "name": "Agiledrop",
      "url": "https://www.agiledrop.com/laravel?utm_source=filament",
      "filename": "agiledrop.svg"
    },
    {
      "name": "Baiz.ai",
      "url": "https://baiz.ai",
      "filename": "baiz-ai.svg"
    },
    {
      "name": "CMS Max",
      "url": "https://cmsmax.com?ref=filamentphp.com",
      "filename": "cms-max.svg"
    },
    {
      "name": "Mailtrap",
      "url": "https://mailtrap.io/email-sending?utm_source=community&utm_medium=referral&utm_campaign=filament",
      "filename": "mailtrap.svg"
    },
    {
      "name": "SerpApi",
      "url": "https://serpapi.com/?utm_source=filamentphp",
      "filename": "serpapi.svg"
    }
  ]
}`);
  function shuffleArray(items) {
    const result = [...items];
    for (let index = result.length - 1; index > 0; index--) {
      const randomIndex = Math.floor(Math.random() * (index + 1));
      [result[index], result[randomIndex]] = [result[randomIndex], result[index]];
    }
    return result;
  }
  const sponsors = Object.entries(sponsorsByTier).flatMap(([, sponsors]) => shuffleArray(sponsors));
  return <div className="mt-16 flex flex-col gap-4">
      <h2 className="text-center text-2xl font-medium text-gray-800 dark:text-gray-200">
        Sponsored by
      </h2>

      <div className="not-prose flex flex-wrap items-center justify-center gap-5">
        {sponsors.map(sponsor => <a key={sponsor.name} className="footer-sponsor-card" href={sponsor.url} target="_blank" title={sponsor.name}>
            <img src={`/docs/images/sponsors/footer/${sponsor.filename}`} alt={sponsor.name} noZoom />
            <span className="line-pattern-overlay line-pattern-80" />
          </a>)}

        <a href="https://github.com/sponsors/danharrin" target="_blank" className="footer-sponsor-cta">
          <span className="sponsor-cta-content">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round">
              <path d="M5 12h14" />
              <path d="M12 5v14" />
            </svg>
            <span>Your logo here</span>
          </span>
          <span className="line-pattern-overlay line-pattern-60" />
        </a>
      </div>
    </div>;
};

## Introduction

<AutoScreenshot name="infolists/overview" alt="Product infolist example" version="5.x" />

Filament's infolists package lets you display a read-only list of data for a specific entity. It's integrated into other Filament packages, such as inside [panel resources](../resources), [relation managers](../resources/managing-relationships), and [action modals](../actions). Understanding how to use the infolist builder will save you time when building custom Livewire applications or working with other Filament features.

This guide covers the fundamentals of building infolists with Filament. If you want to add an infolist to your own Livewire component, [start here](../components/infolist) before continuing. If you're adding an infolist to a [panel resource](../resources), or using another Filament package, you're ready to begin!

## Defining entries

Entry classes can be found in the `Filament\Infolists\Components` namespace. They reside within the schema array of components. Filament includes a number of entries built-in:

* [Text entry](./text-entry)
* [Icon entry](./icon-entry)
* [Image entry](./image-entry)
* [Color entry](./color-entry)
* [Code entry](./code-entry)
* [Key-value entry](./key-value-entry)
* [Repeatable entry](./repeatable-entry)

You may also [create your own custom entries](./custom-entries) to display data however you wish.

Entries may be created using the static `make()` method, passing its unique name. Usually, the name of an entry corresponds to the name of an attribute on an Eloquent model. You may use "dot notation" to access attributes within relationships:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('title')

TextEntry::make('author.name')
```

<AutoScreenshot name="infolists/entries/simple" alt="Entries in an infolist" version="5.x" />

## Entry content (state)

Entries may feel a bit magic at first, but they are designed to be simple to use and optimized to display data from an Eloquent record. Despite this, they are flexible and you can display data from any source, not just an Eloquent record attribute.

The data that an entry displays is called its "state". When using a [panel resource](../resources), the infolist is aware of the record it is displaying. This means that the state of the entry is set based on the value of the attribute on the record. For example, if the entry is used in the infolist of a `PostResource`, then the `title` attribute value of the current post will be displayed.

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('title')
```

If you want to access the value stored in a relationship, you can use "dot notation". The name of the relationship that you would like to access data from comes first, followed by a dot, and then the name of the attribute:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('author.name')
```

You can also use "dot notation" to access values within a JSON / array column on an Eloquent model. The name of the attribute comes first, followed by a dot, and then the key of the JSON object you want to read from:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('meta.title')
```

### Setting the state of an entry

You can pass your own state to an entry by using the `state()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('title')
    ->state('Hello, world!')
```

<UtilityInjection set="infolistEntries" except="$state" version="5.x">The `state()` method also accepts a function to dynamically calculate the state. You can inject various utilities into the function as parameters.</UtilityInjection>

### Setting the default state of an entry

When an entry is empty (its state is `null`), you can use the `default()` method to define alternative state to use instead. This method will treat the default state as if it were real, so entries like [image](./image-entry) or [color](./color-entry) will display the default image or color.

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('title')
    ->default('Untitled')
```

#### Adding placeholder text if an entry is empty

Sometimes you may want to display placeholder text for entries with an empty state, which is styled as a lighter gray text. This differs from the [default value](#setting-the-default-state-of-an-entry), as the placeholder is always text and not treated as if it were real state.

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('title')
    ->placeholder('Untitled')
```

<AutoScreenshot name="infolists/entries/placeholder" alt="Entry with a placeholder for empty state" version="5.x" />

## Setting an entry's label

By default, the label of the entry, which is displayed in the header of the infolist, is generated from the name of the entry. You may customize this using the `label()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('name')
    ->label('Full name')
```

<UtilityInjection set="infolistEntries" version="5.x">As well as allowing a static value, the `label()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

Customizing the label in this way is useful if you wish to use a [translation string for localization](https://laravel.com/docs/localization#retrieving-translation-strings):

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('name')
    ->label(__('entries.name'))
```

### Hiding an entry's label

<Tip>
  If you're looking to hide an entry's label, it might be the case that you are trying to use an entry for arbitrary text or UI. Entries are specifically designed to display data in a structured way, but [Prime components](../schemas/overview#prime-components) are simple components that are used to render basic stand-alone static content, such as text, images, and buttons (actions). You may want to consider using a Prime component instead.
</Tip>

It may be tempting to set the label to an empty string to hide it, but this is not recommended. Setting the label to an empty string will not communicate the purpose of the entry to screen readers, even if the purpose is clear visually. Instead, you should use the `hiddenLabel()` method, so it is hidden visually but still accessible to screen readers:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('name')
    ->hiddenLabel()
```

<AutoScreenshot name="infolists/entries/hidden-label" alt="Entry with a hidden label" version="5.x" />

Optionally, you may pass a boolean value to control if the label should be hidden or not:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('name')
    ->hiddenLabel(FeatureFlag::active())
```

<UtilityInjection set="infolistEntries" version="5.x">As well as allowing a static value, the `hiddenLabel()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

## Opening a URL when an entry is clicked

When an entry is clicked, you may open a URL. To do this, pass a URL to the `url()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('title')
    ->url('/about/titles')
```

You may pass a function to the `url()` method to dynamically calculate the URL. For example, you may want to access the current Eloquent record for the infolist by injecting `$record` as an argument:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('title')
    ->url(fn (Post $record): string => route('posts.edit', ['post' => $record]))
```

If you're using a [panel resource](../resources), you can generate a link to a page for the record using the `getUrl()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Filament\Posts\PostResource;
use Filament\Infolists\Components\TextEntry;

TextEntry::make('title')
    ->url(fn (Post $record): string => PostResource::getUrl('edit', ['record' => $record]))
```

<UtilityInjection set="infolistEntries" version="5.x">The function passed to `url()` can inject various utilities as parameters.</UtilityInjection>

You may also choose to open the URL in a new tab:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('title')
    ->url(fn (Post $record): string => PostResource::getUrl('edit', ['record' => $record]))
    ->openUrlInNewTab()
```

Optionally, you may pass a boolean value to control if the URL should open in a new tab or not:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('title')
    ->url(fn (Post $record): string => PostResource::getUrl('edit', ['record' => $record]))
    ->openUrlInNewTab(FeatureFlag::active())
```

<UtilityInjection set="infolistEntries" version="5.x">As well as allowing a static value, the `openUrlInNewTab()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<Danger>
  If you are passing user-controlled data to the `url()` method, you should validate that the URL does not use a dangerous scheme such as `javascript:` or `data:`. Failing to do so could expose your application to XSS attacks.
</Danger>

## Hiding an entry

You may hide an entry:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('role')
    ->hidden()
```

Optionally, you may pass a boolean value to control if the entry should be hidden or not:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('role')
    ->hidden(! FeatureFlag::active())
```

<UtilityInjection set="infolistEntries" version="5.x">As well as allowing a static value, the `hidden()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

Alternatively, you may use the `visible()` method to control if the entry should be hidden or not. In some situations, this may help to make your code more readable:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('role')
    ->visible(FeatureFlag::active())
```

<UtilityInjection set="infolistEntries" version="5.x">As well as allowing a static value, the `visible()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<Info>
  If both `hidden()` and `visible()` are used, they both need to indicate that the entry should be visible for it to be shown.
</Info>

### Hiding an entry using JavaScript

If you need to hide an entry based on a user interaction, you can use the `hidden()` or `visible()` methods, passing a function that uses utilities injected to determine whether the entry should be hidden or not:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Select;
use Filament\Infolists\Components\IconEntry;

Select::make('role')
    ->options([
        'user' => 'User',
        'staff' => 'Staff',
    ])
    ->live()

IconEntry::make('is_admin')
    ->boolean()
    ->hidden(fn (Get $get): bool => $get('role') !== 'staff')
```

In this example, the `role` field is set to `live()`, which means that the schema will reload the schema each time the `role` field is changed. This will cause the function that is passed to the `hidden()` method to be re-evaluated, which will hide the `is_admin` entry if the `role` field is not set to `staff`.

However, reloading the schema each time an entry causes a network request to be made, since there is no way to re-run the PHP function from the client-side. This is not ideal for performance.

Alternatively, you can write JavaScript to hide the entry based on the value of a field. This is done by passing a JavaScript expression to the `hiddenJs()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Select;
use Filament\Infolists\Components\IconEntry;

Select::make('role')
    ->options([
        'user' => 'User',
        'staff' => 'Staff',
    ])

IconEntry::make('is_admin')
    ->boolean()
    ->hiddenJs(<<<'JS'
        $get('role') !== 'staff'
        JS)
```

Although the code passed to `hiddenJs()` looks very similar to PHP, it is actually JavaScript. Filament provides the `$get()` utility function to JavaScript that behaves very similar to its PHP equivalent, but without requiring the depended-on entry to be `live()`.

The `visibleJs()` method is also available, which works in the same way as `hiddenJs()`, but controls if the entry should be visible or not:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Select;
use Filament\Infolists\Components\IconEntry;

Select::make('role')
    ->options([
        'user' => 'User',
        'staff' => 'Staff',
    ])
    
IconEntry::make('is_admin')
    ->boolean()
    ->visibleJs(<<<'JS'
        $get('role') === 'staff'
        JS)
```

<Info>
  If both `hiddenJs()` and `visibleJs()` are used, they both need to indicate that the entry should be visible for it to be shown.
</Info>

### Hiding an entry based on the current operation

The "operation" of a schema is the current action being performed on it. Usually, this is either `create`, `edit` or `view`, if you are using the [panel resource](../resources).

You can hide an entry based on the current operation by passing an operation to the `hiddenOn()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\IconEntry;

IconEntry::make('is_admin')
    ->boolean()
    ->hiddenOn('edit')
    
// is the same as

IconEntry::make('is_admin')
    ->boolean()
    ->hidden(fn (string $operation): bool => $operation === 'edit')
```

You can also pass an array of operations to the `hiddenOn()` method, and the entry will be hidden if the current operation is any of the operations in the array:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\IconEntry;

IconEntry::make('is_admin')
    ->boolean()
    ->hiddenOn(['edit', 'view'])
    
// is the same as

IconEntry::make('is_admin')
    ->boolean()
    ->hidden(fn (string $operation): bool => in_array($operation, ['edit', 'view']))
```

<Warning>
  The `hiddenOn()` method will overwrite any previous calls to the `hidden()` method, and vice versa.
</Warning>

Alternatively, you may use the `visibleOn()` method to control if the entry should be hidden or not. In some situations, this may help to make your code more readable:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\IconEntry;

IconEntry::make('is_admin')
    ->boolean()
    ->visibleOn('create')

IconEntry::make('is_admin')
    ->boolean()
    ->visibleOn(['create', 'edit'])
```

<Info>
  The `visibleOn()` method will overwrite any previous calls to the `visible()` method, and vice versa.
</Info>

## Inline labels

Entries may have their labels displayed inline with the entry, rather than above it. This is useful for infolists with many entries, where vertical space is at a premium. To display an entry's label inline, use the `inlineLabel()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextInput::make('name')
    ->inlineLabel()
```

<AutoScreenshot name="infolists/entries/inline-label" alt="Infolist entry with inline label" version="5.x" />

Optionally, you may pass a boolean value to control if the label should be displayed inline or not:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextInput;

TextInput::make('name')
    ->inlineLabel(FeatureFlag::active())
```

<UtilityInjection set="infolistEntries" version="5.x">As well as allowing a static value, the `inlineLabel()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

### Using inline labels in multiple places at once

If you wish to display all labels inline in a [layout component](../schemas/layouts) like a [section](../schemas/sections) or [tab](../schemas/tabs), you can use the `inlineLabel()` on the component itself, and all entries within it will have their labels displayed inline:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextInput;
use Filament\Schemas\Components\Section;

Section::make('Details')
    ->inlineLabel()
    ->schema([
        TextInput::make('name'),
        TextInput::make('email')
            ->label('Email address'),
        TextInput::make('phone')
            ->label('Phone number'),
    ])
```

<AutoScreenshot name="infolists/entries/inline-label/section" alt="Infolist entries with inline labels in a section" version="5.x" />

You can also use `inlineLabel()` on the entire schema to display all labels inline:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Schemas\Schema;

public function infolist(Schema $schema): Schema
{
    return $schema
        ->inlineLabel()
        ->components([
            // ...
        ]);
}
```

When using `inlineLabel()` on a layout component or schema, you can still opt-out of inline labels for individual entries by using the `inlineLabel(false)` method on the entry:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextInput;
use Filament\Schemas\Components\Section;

Section::make('Details')
    ->inlineLabel()
    ->schema([
        TextInput::make('name'),
        TextInput::make('email')
            ->label('Email address'),
        TextInput::make('phone')
            ->label('Phone number')
            ->inlineLabel(false),
    ])
```

## Adding a tooltip to an entry

You may specify a tooltip to display when you hover over an entry:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('title')
    ->tooltip('Shown at the top of the page')
```

<UtilityInjection set="infolistEntries" version="5.x">As well as allowing a static value, the `tooltip()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<AutoScreenshot name="infolists/entries/tooltips" alt="Entry with tooltip" version="5.x" />

## Aligning entry content

You may align the content of an entry to the start (left in left-to-right interfaces, right in right-to-left interfaces), center, or end (right in left-to-right interfaces, left in right-to-left interfaces) using the `alignStart()`, `alignCenter()` or `alignEnd()` methods:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('title')
    ->alignStart() // This is the default alignment.

TextEntry::make('title')
    ->alignCenter()

TextEntry::make('title')
    ->alignEnd()
```

Alternatively, you may pass an `Alignment` enum to the `alignment()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;
use Filament\Support\Enums\Alignment;

TextEntry::make('title')
    ->alignment(Alignment::Center)
```

<UtilityInjection set="infolistEntries" version="5.x">As well as allowing a static value, the `alignment()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<AutoScreenshot name="infolists/entries/alignment" alt="Entries with different alignments" version="5.x" />

## Adding extra content to an entry

Entries contain many "slots" where content can be inserted in a child schema. Slots can accept text, [any schema component](../schemas), [actions](../actions) and [action groups](../actions/grouping-actions). Usually, [prime components](../schemas/primes) are used for content.

The following slots are available for all entries:

* `aboveLabel()`
* `beforeLabel()`
* `afterLabel()`
* `belowLabel()`
* `aboveContent()`
* `beforeContent()`
* `afterContent()`
* `belowContent()`

<UtilityInjection set="infolistEntries" version="5.x">As well as allowing static values, the slot methods also accept functions to dynamically calculate them. You can inject various utilities into the functions as parameters.</UtilityInjection>

To insert plain text, you can pass a string to these methods:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('name')
    ->belowContent('This is the user\'s full name.')
```

<AutoScreenshot name="infolists/entries/below-content/text" alt="Infolist entry with text below content" version="5.x" />

To insert a schema component, often a [prime component](../schemas/primes), you can pass the component to the method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Text;
use Filament\Support\Enums\FontWeight;

TextEntry::make('name')
    ->belowContent(Text::make('This is the user\'s full name.')->weight(FontWeight::Bold))
```

<AutoScreenshot name="infolists/entries/below-content/component" alt="Infolist entry with component below content" version="5.x" />

To insert an [action](../actions) or [action group](../actions/grouping-actions), you can pass the action or action group to the method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;
use Filament\Infolists\Components\TextEntry;

TextEntry::make('name')
    ->belowContent(Action::make('generate'))
```

<AutoScreenshot name="infolists/entries/below-content/action" alt="Infolist entry with action below content" version="5.x" />

You can insert any combination of content into the slots by passing an array of content to the method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Icon;
use Filament\Support\Icons\Heroicon;

TextEntry::make('name')
    ->belowContent([
        Icon::make(Heroicon::InformationCircle),
        'This is the user\'s full name.',
        Action::make('generate'),
    ])
```

<AutoScreenshot name="infolists/entries/below-content" alt="Infolist entry with multiple components below content" version="5.x" />

You can also align the content in the slots by passing the array of content to either `Schema::start()` (default), `Schema::end()` or `Schema::between()`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Flex;
use Filament\Schemas\Components\Icon;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

TextEntry::make('name')
    ->belowContent(Schema::end([
        Icon::make(Heroicon::InformationCircle),
        'This is the user\'s full name.',
        Action::make('generate'),
    ]))

TextEntry::make('name')
    ->belowContent(Schema::between([
        Icon::make(Heroicon::InformationCircle),
        'This is the user\'s full name.',
        Action::make('generate'),
    ]))

TextEntry::make('name')
    ->belowContent(Schema::between([
        Flex::make([
            Icon::make(Heroicon::InformationCircle)
                ->grow(false),
            'This is the user\'s full name.',
        ]),
        Action::make('generate'),
    ]))
```

<Tip>
  As you can see in the above example for `Schema::between()`, a [`Flex` component](../schemas/layouts#flex-component) is used to group the icon and text together so they do not have space between them. The icon uses `grow(false)` to prevent it from taking up half of the horizontal space, allowing the text to consume the remaining space.
</Tip>

<AutoScreenshot name="infolists/entries/below-content/alignment" alt="Infolist entry with aligned components below content" version="5.x" />

### Adding extra content above an entry's label

You can insert extra content above an entry's label using the `aboveLabel()` method. You can [pass any content](#adding-extra-content-to-a-entry) to this method, like text, a schema component, an action, or an action group:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Icon;
use Filament\Support\Icons\Heroicon;

TextEntry::make('name')
    ->aboveLabel([
        Icon::make(Heroicon::Star),
        'This is the content above the entry\'s label'
    ])
```

<UtilityInjection set="infolistEntries" version="5.x">As well as allowing a static value, the `aboveLabel()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<AutoScreenshot name="infolists/entries/above-label" alt="Infolist entry with extra content above label" version="5.x" />

### Adding extra content before an entry's label

You can insert extra content before an entry's label using the `beforeLabel()` method. You can [pass any content](#adding-extra-content-to-a-entry) to this method, like text, a schema component, an action, or an action group:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Icon;
use Filament\Support\Icons\Heroicon;

TextEntry::make('name')
    ->beforeLabel(Icon::make(Heroicon::Star))
```

<UtilityInjection set="infolistEntries" version="5.x">As well as allowing a static value, the `beforeLabel()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<AutoScreenshot name="infolists/entries/before-label" alt="Infolist entry with extra content before label" version="5.x" />

### Adding extra content after an entry's label

You can insert extra content after an entry's label using the `afterLabel()` method. You can [pass any content](#adding-extra-content-to-a-entry) to this method, like text, a schema component, an action, or an action group:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Icon;
use Filament\Support\Icons\Heroicon;

TextEntry::make('name')
    ->afterLabel([
        Icon::make(Heroicon::Star),
        'This is the content after the entry\'s label'
    ])
```

<UtilityInjection set="infolistEntries" version="5.x">As well as allowing a static value, the `afterLabel()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<AutoScreenshot name="infolists/entries/after-label" alt="Infolist entry with extra content after label" version="5.x" />

By default, the content in the `afterLabel()` schema is aligned to the end of the container. If you wish to align it to the start of the container, you should pass a `Schema::start()` object containing the content:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Icon;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

TextEntry::make('name')
    ->afterLabel(Schema::start([
        Icon::make(Heroicon::Star),
        'This is the content after the entry\'s label'
    ]))
```

<UtilityInjection set="infolistEntries" version="5.x">As well as allowing a static value, the `afterLabel()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<AutoScreenshot name="infolists/entries/after-label/aligned-start" alt="Infolist entry with extra content after label aligned to the start" version="5.x" />

### Adding extra content below an entry's label

You can insert extra content below an entry's label using the `belowLabel()` method. You can [pass any content](#adding-extra-content-to-a-entry) to this method, like text, a schema component, an action, or an action group:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Icon;
use Filament\Support\Icons\Heroicon;

TextEntry::make('name')
    ->belowLabel([
        Icon::make(Heroicon::Star),
        'This is the content below the entry\'s label'
    ])
```

<UtilityInjection set="infolistEntries" version="5.x">As well as allowing a static value, the `belowLabel()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<AutoScreenshot name="infolists/entries/below-label" alt="Infolist entry with extra content below label" version="5.x" />

<Info>
  This may seem like the same as the [`aboveContent()` method](#adding-extra-content-above-a-entries-content). However, when using [inline labels](#inline-labels), the `aboveContent()` method will place the content above the entry, not below the label, since the label is displayed in a separate column to the entry content.
</Info>

### Adding extra content above an entry's content

You can insert extra content above an entry's content using the `aboveContent()` method. You can [pass any content](#adding-extra-content-to-a-entry) to this method, like text, a schema component, an action, or an action group:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Icon;
use Filament\Support\Icons\Heroicon;

TextEntry::make('name')
    ->aboveContent([
        Icon::make(Heroicon::Star),
        'This is the content above the entry\'s content'
    ])
```

<UtilityInjection set="infolistEntries" version="5.x">As well as allowing a static value, the `aboveContent()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<AutoScreenshot name="infolists/entries/above-content" alt="Infolist entry with extra content above content" version="5.x" />

<Info>
  This may seem like the same as the [`belowLabel()` method](#adding-extra-content-below-a-entries-label). However, when using [inline labels](#inline-labels), the `belowLabel()` method will place the content below the label, not above the entry's content, since the label is displayed in a separate column to the entry content.
</Info>

### Adding extra content before an entry's content

You can insert extra content before an entry's content using the `beforeContent()` method. You can [pass any content](#adding-extra-content-to-a-entry) to this method, like text, a schema component, an action, or an action group:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Icon;
use Filament\Support\Icons\Heroicon;

TextEntry::make('name')
    ->beforeContent(Icon::make(Heroicon::Star))
```

<UtilityInjection set="infolistEntries" version="5.x">As well as allowing a static value, the `beforeContent()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<AutoScreenshot name="infolists/entries/before-content" alt="Infolist entry with extra content before content" version="5.x" />

### Adding extra content after an entry's content

You can insert extra content after an entry's content using the `afterContent()` method. You can [pass any content](#adding-extra-content-to-a-entry) to this method, like text, a schema component, an action, or an action group:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Icon;
use Filament\Support\Icons\Heroicon;

TextEntry::make('name')
    ->afterContent(Icon::make(Heroicon::Star))
```

<UtilityInjection set="infolistEntries" version="5.x">As well as allowing a static value, the `afterContent()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<AutoScreenshot name="infolists/entries/after-content" alt="Infolist entry with extra content after content" version="5.x" />

## Adding extra HTML attributes to an entry

You can pass extra HTML attributes to the entry via the `extraAttributes()` method, which will be merged onto its outer HTML element. The attributes should be represented by an array, where the key is the attribute name and the value is the attribute value:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('slug')
    ->extraAttributes(['class' => 'bg-gray-200'])
```

<UtilityInjection set="infolistEntries" version="5.x">As well as allowing a static value, the `extraAttributes()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

By default, calling `extraAttributes()` multiple times will overwrite the previous attributes. If you wish to merge the attributes instead, you can pass `merge: true` to the method.

### Adding extra HTML attributes to the entry wrapper

You can also pass extra HTML attributes to the very outer element of the "entry wrapper" which surrounds the label and content of the entry. This is useful if you want to style the label or spacing of the entry via CSS, since you could target elements as children of the wrapper:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('slug')
    ->extraEntryWrapperAttributes(['class' => 'components-locked'])
```

<UtilityInjection set="infolistEntries" version="5.x">As well as allowing a static value, the `extraEntryWrapperAttributes()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

By default, calling `extraEntryWrapperAttributes()` multiple times will overwrite the previous attributes. If you wish to merge the attributes instead, you can pass `merge: true` to the method.

## Entry utility injection

The vast majority of methods used to configure entries accept functions as parameters instead of hardcoded values:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Models\User;
use Filament\Infolists\Components\TextEntry;

TextEntry::make('name')
    ->label(fn (string $state): string => str_contains($state, ' ') ? 'Full name' : 'Name')

TextEntry::make('currentUserEmail')
    ->state(fn (): string => auth()->user()->email)

TextEntry::make('role')
    ->hidden(fn (User $record): bool => $record->role === 'admin')
```

This alone unlocks many customization possibilities.

The package is also able to inject many utilities to use inside these functions, as parameters. All customization methods that accept functions as arguments can inject utilities.

These injected utilities require specific parameter names to be used. Otherwise, Filament doesn't know what to inject.

### Injecting the current state of the entry

If you wish to access the current [value (state)](#entry-content-state) of the entry, define a `$state` parameter:

```php theme={"theme":"gruvbox-dark-hard"}
function ($state) {
    // ...
}
```

### Injecting the state of another entry or form field

You may also retrieve the state (value) of another entry or form field from within a callback, using a `$get` parameter:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Schemas\Components\Utilities\Get;

function (Get $get) {
    $email = $get('email'); // Store the value of the `email` entry in the `$email` variable.
    //...
}
```

<Tip>
  Unless a form field is [reactive](../forms/overview#the-basics-of-reactivity), the schema will not refresh when the value of the field changes, only when the next user interaction occurs that makes a request to the server. If you need to react to changes in a field's value, it should be `live()`.
</Tip>

### Injecting the current Eloquent record

You may retrieve the Eloquent record for the current schema using a `$record` parameter:

```php theme={"theme":"gruvbox-dark-hard"}
use Illuminate\Database\Eloquent\Model;

function (?Model $record) {
    // ...
}
```

### Injecting the current operation

If you're writing a schema for a panel resource or relation manager, and you wish to check if a schema is `create`, `edit` or `view`, use the `$operation` parameter:

```php theme={"theme":"gruvbox-dark-hard"}
function (string $operation) {
    // ...
}
```

<Info>
  You can manually set a schema's operation using the `$schema->operation()` method.
</Info>

### Injecting the current Livewire component instance

If you wish to access the current Livewire component instance, define a `$livewire` parameter:

```php theme={"theme":"gruvbox-dark-hard"}
use Livewire\Component;

function (Component $livewire) {
    // ...
}
```

### Injecting the current entry instance

If you wish to access the current component instance, define a `$component` parameter:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\Entry;

function (Entry $component) {
    // ...
}
```

### Injecting multiple utilities

The parameters are injected dynamically using reflection, so you are able to combine multiple parameters in any order:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Models\User;
use Filament\Schemas\Components\Utilities\Get;
use Livewire\Component as Livewire;

function (Livewire $livewire, Get $get, User $record) {
    // ...
}
```

### Injecting dependencies from Laravel's container

You may inject anything from Laravel's container like normal, alongside utilities:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Models\User;
use Illuminate\Http\Request;

function (Request $request, User $record) {
    // ...
}
```

## Global settings

If you wish to change the default behavior of all entries globally, then you can call the static `configureUsing()` method inside a service provider's `boot()` method, to which you pass a Closure to modify the entries using. For example, if you wish to make all `TextEntry` components [`words(10)`](./text-entry#limiting-word-count), you can do it like so:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::configureUsing(function (TextEntry $entry): void {
    $entry->words(10);
});
```

Of course, you are still able to overwrite this on each entry individually:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('name')
    ->words(null)
```

<EditOnGitHub version="5.x" path="packages/infolists/docs/01-overview.md" />

<Footer />
