<?php declare(strict_types=1);
namespace Phan;

use Phan\Language\Context;

/**
 * An issue emitted during the course of analysis
 */
class Issue
{
    const SyntaxError               = 'PhanSyntaxError';

    // Issue::CATEGORY_UNDEFINED
    const AmbiguousTraitAliasSource = 'AmbiguousTraitAliasSource';
    const ClassContainsAbstractMethodInternal = 'PhanClassContainsAbstractMethodInternal';
    const ClassContainsAbstractMethod = 'PhanClassContainsAbstractMethod';
    const EmptyFile                 = 'PhanEmptyFile';
    const ParentlessClass           = 'PhanParentlessClass';
    const RequiredTraitNotAdded     = 'PhanRequiredTraitNotAdded';
    const TraitParentReference      = 'PhanTraitParentReference';
    const UndeclaredAliasedMethodOfTrait = 'PhanUndeclaredAliasedMethodOfTrait';
    const UndeclaredClassCatch      = 'PhanUndeclaredClassCatch';
    const UndeclaredClassConstant   = 'PhanUndeclaredClassConstant';
    const UndeclaredClassInstanceof = 'PhanUndeclaredClassInstanceof';
    const UndeclaredClassMethod     = 'PhanUndeclaredClassMethod';
    const UndeclaredClass           = 'PhanUndeclaredClass';
    const UndeclaredClassReference  = 'PhanUndeclaredClassReference';
    const UndeclaredClosureScope    = 'PhanUndeclaredClosureScope';
    const UndeclaredConstant        = 'PhanUndeclaredConstant';
    const UndeclaredExtendedClass   = 'PhanUndeclaredExtendedClass';
    const UndeclaredFunction        = 'PhanUndeclaredFunction';
    const UndeclaredInterface       = 'PhanUndeclaredInterface';
    const UndeclaredMethod          = 'PhanUndeclaredMethod';
    const UndeclaredProperty        = 'PhanUndeclaredProperty';
    const UndeclaredStaticMethod    = 'PhanUndeclaredStaticMethod';
    const UndeclaredStaticProperty  = 'PhanUndeclaredStaticProperty';
    const UndeclaredTrait           = 'PhanUndeclaredTrait';
    const UndeclaredTypeParameter   = 'PhanUndeclaredTypeParameter';
    const UndeclaredTypeProperty    = 'PhanUndeclaredTypeProperty';
    const UndeclaredVariable        = 'PhanUndeclaredVariable';

    // Issue::CATEGORY_TYPE
    const NonClassMethodCall        = 'PhanNonClassMethodCall';
    const TypeArrayOperator         = 'PhanTypeArrayOperator';
    const TypeArraySuspicious       = 'PhanTypeArraySuspicious';
    const TypeSuspiciousIndirectVariable = 'PhanTypeSuspiciousIndirectVariable';
    const TypeComparisonFromArray   = 'PhanTypeComparisonFromArray';
    const TypeComparisonToArray     = 'PhanTypeComparisonToArray';
    const TypeConversionFromArray   = 'PhanTypeConversionFromArray';
    const TypeInstantiateAbstract   = 'PhanTypeInstantiateAbstract';
    const TypeInstantiateInterface  = 'PhanTypeInstantiateInterface';
    const TypeInvalidClosureScope   = 'PhanTypeInvalidClosureScope';
    const TypeInvalidLeftOperand    = 'PhanTypeInvalidLeftOperand';
    const TypeInvalidRightOperand   = 'PhanTypeInvalidRightOperand';
    const TypeMismatchArgument      = 'PhanTypeMismatchArgument';
    const TypeMismatchArgumentInternal = 'PhanTypeMismatchArgumentInternal';
    const TypeMismatchDefault       = 'PhanTypeMismatchDefault';
    const TypeMismatchVariadicComment = 'PhanMismatchVariadicComment';
    const TypeMismatchVariadicParam = 'PhanMismatchVariadicParam';
    const TypeMismatchForeach       = 'PhanTypeMismatchForeach';
    const TypeMismatchProperty      = 'PhanTypeMismatchProperty';
    const TypeMismatchReturn        = 'PhanTypeMismatchReturn';
    const TypeMismatchDeclaredReturn = 'PhanTypeMismatchDeclaredReturn';
    const TypeMissingReturn         = 'PhanTypeMissingReturn';
    const TypeNonVarPassByRef       = 'PhanTypeNonVarPassByRef';
    const TypeParentConstructorCalled = 'PhanTypeParentConstructorCalled';
    const TypeVoidAssignment        = 'PhanTypeVoidAssignment';

    // Issue::CATEGORY_ANALYSIS
    const Unanalyzable              = 'PhanUnanalyzable';

    // Issue::CATEGORY_VARIABLE
    const VariableUseClause         = 'PhanVariableUseClause';

    // Issue::CATEGORY_STATIC
    const StaticCallToNonStatic     = 'PhanStaticCallToNonStatic';

    // Issue::CATEGORY_CONTEXT
    const ContextNotObject          = 'PhanContextNotObject';

    // Issue::CATEGORY_DEPRECATED
    const DeprecatedClass           = 'PhanDeprecatedClass';
    const DeprecatedInterface       = 'PhanDeprecatedInterface';
    const DeprecatedTrait           = 'PhanDeprecatedTrait';
    const DeprecatedFunction        = 'PhanDeprecatedFunction';
    const DeprecatedFunctionInternal = 'PhanDeprecatedFunctionInternal';
    const DeprecatedProperty        = 'PhanDeprecatedProperty';

    // Issue::CATEGORY_PARAMETER
    const ParamReqAfterOpt          = 'PhanParamReqAfterOpt';
    const ParamSpecial1             = 'PhanParamSpecial1';
    const ParamSpecial2             = 'PhanParamSpecial2';
    const ParamSpecial3             = 'PhanParamSpecial3';
    const ParamSpecial4             = 'PhanParamSpecial4';
    const ParamTooFew               = 'PhanParamTooFew';
    const ParamTooFewInternal       = 'PhanParamTooFewInternal';
    const ParamTooMany              = 'PhanParamTooMany';
    const ParamTooManyInternal      = 'PhanParamTooManyInternal';
    const ParamTypeMismatch         = 'PhanParamTypeMismatch';
    const ParamSignatureMismatch    = 'PhanParamSignatureMismatch';
    const ParamSignatureMismatchInternal = 'PhanParamSignatureMismatchInternal';
    const ParamRedefined            = 'PhanParamRedefined';

    const ParamSignatureRealMismatchReturnType                        = 'PhanParamSignatureRealMismatch';
    const ParamSignatureRealMismatchReturnTypeInternal                = 'PhanParamSignatureRealMismatchInternal';
    const ParamSignatureRealMismatchTooManyRequiredParameters         = 'PhanParamSignatureRealMismatchTooManyRequiredParameters';
    const ParamSignatureRealMismatchTooManyRequiredParametersInternal = 'PhanParamSignatureRealMismatchTooManyRequiredParametersInternal';
    const ParamSignatureRealMismatchTooFewParameters                  = 'PhanParamSignatureRealMismatchTooFewParameters';
    const ParamSignatureRealMismatchTooFewParametersInternal          = 'PhanParamSignatureRealMismatchTooFewParametersInternal';
    const ParamSignatureRealMismatchHasParamType                      = 'PhanParamSignatureRealMismatchHasParamType';
    const ParamSignatureRealMismatchHasParamTypeInternal              = 'PhanParamSignatureRealMismatchHasParamTypeInternal';
    const ParamSignatureRealMismatchHasNoParamType                    = 'PhanParamSignatureRealMismatchHasNoParamType';
    const ParamSignatureRealMismatchHasNoParamTypeInternal            = 'PhanParamSignatureRealMismatchHasNoParamTypeInternal';
    const ParamSignatureRealMismatchParamIsReference                  = 'PhanParamSignatureRealMismatchParamIsReference';
    const ParamSignatureRealMismatchParamIsReferenceInternal          = 'PhanParamSignatureRealMismatchParamIsReferenceInternal';
    const ParamSignatureRealMismatchParamIsNotReference               = 'PhanParamSignatureRealMismatchParamIsNotReference';
    const ParamSignatureRealMismatchParamIsNotReferenceInternal       = 'PhanParamSignatureRealMismatchParamIsNotReferenceInternal';
    const ParamSignatureRealMismatchParamVariadic                     = 'PhanParamSignatureRealMismatchParamVariadic';
    const ParamSignatureRealMismatchParamVariadicInternal             = 'PhanParamSignatureRealMismatchParamVariadicInternal';
    const ParamSignatureRealMismatchParamNotVariadic                  = 'PhanParamSignatureRealMismatchParamNotVariadic';
    const ParamSignatureRealMismatchParamNotVariadicInternal          = 'PhanParamSignatureRealMismatchParamNotVariadicInternal';
    const ParamSignatureRealMismatchParamType                         = 'PhanParamSignatureRealMismatchParamType';
    const ParamSignatureRealMismatchParamTypeInternal                 = 'PhanParamSignatureRealMismatchParamTypeInternal';

    // Issue::CATEGORY_NOOP
    const NoopArray                 = 'PhanNoopArray';
    const NoopClosure               = 'PhanNoopClosure';
    const NoopConstant              = 'PhanNoopConstant';
    const NoopProperty              = 'PhanNoopProperty';
    const NoopVariable              = 'PhanNoopVariable';
    const UnreferencedClass         = 'PhanUnreferencedClass';
    const UnreferencedMethod        = 'PhanUnreferencedMethod';
    const UnreferencedProperty      = 'PhanUnreferencedProperty';
    const UnreferencedConstant      = 'PhanUnreferencedConstant';

    // Issue::CATEGORY_REDEFINE
    const RedefineClass             = 'PhanRedefineClass';
    const RedefineClassInternal     = 'PhanRedefineClassInternal';
    const RedefineFunction          = 'PhanRedefineFunction';
    const RedefineFunctionInternal  = 'PhanRedefineFunctionInternal';
    const IncompatibleCompositionProp = 'PhanIncompatibleCompositionProp';
    const IncompatibleCompositionMethod = 'PhanIncompatibleCompositionMethod';

    // Issue::CATEGORY_ACCESS
    const AccessPropertyPrivate     = 'PhanAccessPropertyPrivate';
    const AccessPropertyProtected   = 'PhanAccessPropertyProtected';
    const AccessMethodPrivate       = 'PhanAccessMethodPrivate';
    const AccessMethodPrivateWithCallMagicMethod = 'PhanAccessMethodPrivateWithCallMagicMethod';
    const AccessMethodProtected     = 'PhanAccessMethodProtected';
    const AccessMethodProtectedWithCallMagicMethod = 'PhanAccessMethodProtectedWithCallMagicMethod';
    const AccessSignatureMismatch   = 'PhanAccessSignatureMismatch';
    const AccessSignatureMismatchInternal = 'PhanAccessSignatureMismatchInternal';
    const AccessStaticToNonStatic   = 'PhanAccessStaticToNonStatic';
    const AccessNonStaticToStatic   = 'PhanAccessNonStaticToStatic';
    const AccessClassConstantPrivate     = 'PhanAccessClassConstantPrivate';
    const AccessClassConstantProtected   = 'PhanAccessClassConstantProtected';
    const AccessPropertyStaticAsNonStatic = 'PhanAccessPropertyStaticAsNonStatic';

    const AccessConstantInternal    = 'PhanAccessConstantInternal';
    const AccessClassInternal       = 'PhanAccessClassInternal';
    const AccessClassConstantInternal = 'PhanAccessClassConstantInternal';
    const AccessPropertyInternal    = 'PhanAccessPropertyInternal';
    const AccessMethodInternal      = 'PhanAccessMethodInternal';

    // Issue::CATEGORY_COMPATIBLE
    const CompatibleExpressionPHP7  = 'PhanCompatibleExpressionPHP7';
    const CompatiblePHP7            = 'PhanCompatiblePHP7';

    // Issue::CATEGORY_GENERIC
    const TemplateTypeConstant      = 'PhanTemplateTypeConstant';
    const TemplateTypeStaticMethod  = 'PhanTemplateTypeStaticMethod';
    const TemplateTypeStaticProperty = 'PhanTemplateTypeStaticProperty';
    const GenericGlobalVariable     = 'PhanGenericGlobalVariable';
    const GenericConstructorTypes   = 'PhanGenericConstructorTypes';

    // Issue::CATEGORY_COMMENT
    const InvalidCommentForDeclarationType = 'PhanInvalidCommentForDeclarationType';
    const MisspelledAnnotation             = 'PhanMisspelledAnnotation';
    const UnextractableAnnotation          = 'PhanUnextractableAnnotation';
    const UnextractableAnnotationPart      = 'PhanUnextractableAnnotationPart';
    const CommentParamWithoutRealParam     = 'PhanCommentParamWithoutRealParam';
    const CommentParamOnEmptyParamList     = 'PhanCommentParamOnEmptyParamList';


    const CATEGORY_ACCESS            = 1 << 1;
    const CATEGORY_ANALYSIS          = 1 << 2;
    const CATEGORY_COMPATIBLE        = 1 << 3;
    const CATEGORY_CONTEXT           = 1 << 4;
    const CATEGORY_DEPRECATED        = 1 << 5;
    const CATEGORY_NOOP              = 1 << 6;
    const CATEGORY_PARAMETER         = 1 << 7;
    const CATEGORY_REDEFINE          = 1 << 8;
    const CATEGORY_STATIC            = 1 << 9;
    const CATEGORY_TYPE              = 1 << 10;
    const CATEGORY_UNDEFINED         = 1 << 11;
    const CATEGORY_VARIABLE          = 1 << 12;
    const CATEGORY_PLUGIN            = 1 << 13;
    const CATEGORY_GENERIC           = 1 << 14;
    const CATEGORY_INTERNAL          = 1 << 15;
    const CATEGORY_COMMENT           = 1 << 16;

    const CATEGORY_NAME = [
        self::CATEGORY_ACCESS            => 'AccessError',
        self::CATEGORY_ANALYSIS          => 'Analysis',
        self::CATEGORY_COMPATIBLE        => 'CompatError',
        self::CATEGORY_CONTEXT           => 'Context',
        self::CATEGORY_DEPRECATED        => 'DeprecatedError',
        self::CATEGORY_NOOP              => 'NOOPError',
        self::CATEGORY_PARAMETER         => 'ParamError',
        self::CATEGORY_REDEFINE          => 'RedefineError',
        self::CATEGORY_STATIC            => 'StaticCallError',
        self::CATEGORY_TYPE              => 'TypeError',
        self::CATEGORY_UNDEFINED         => 'UndefError',
        self::CATEGORY_VARIABLE          => 'VarError',
        self::CATEGORY_PLUGIN            => 'Plugin',
        self::CATEGORY_GENERIC           => 'Generic',
        self::CATEGORY_INTERNAL          => 'Internal',
    ];

    const SEVERITY_LOW      = 0;
    const SEVERITY_NORMAL   = 5;
    const SEVERITY_CRITICAL = 10;

    // See https://docs.codeclimate.com/v1.0/docs/remediation
    const REMEDIATION_A = 1000000;
    const REMEDIATION_B = 3000000;
    const REMEDIATION_C = 6000000;
    const REMEDIATION_D = 12000000;
    const REMEDIATION_E = 16000000;
    const REMEDIATION_F = 18000000;

    // type id constants.
    const TYPE_ID_UNKNOWN = 999;

    // Keep sorted and in sync with Colorizing::default_color_for_template
    const uncolored_format_string_for_template = [
        'CLASS'         => '%s',
        'COMMENT'       => '%s',
        'CONST'         => '%s',
        'COUNT'         => '%d',
        'FILE'          => '%s',
        'FUNCTIONLIKE'  => '%s',
        'FUNCTION'      => '%s',
        'INDEX'         => '%d',
        'INTERFACE'     => '%s',
        'ISSUETYPE'     => '%s',  // used by Phan\Output\Printer, for minor issues.
        'ISSUETYPE_CRITICAL' => '%s',  // for critical issues
        'ISSUETYPE_NORMAL' => '%s',  // for normal issues
        'LINE'          => '%d',
        'METHOD'        => '%s',
        'NAMESPACE'     => '%s',
        'PARAMETER'     => '%s',
        'PROPERTY'      => '%s',
        'TYPE'          => '%s',
        'TRAIT'         => '%s',
        'VARIABLE'      => '%s',
    ];

    /** @var string */
    private $type;

    /** @var int */
    private $type_id;

    /** @var int */
    private $category;

    /** @var int */
    private $severity;

    /** @var string - Used for colorizing option. */
    private $template_raw;

    /** @var string */
    private $template;

    /** @var int */
    private $remediation_difficulty;

    /**
     * @param string $type
     * @param int $category
     * @param int $severity
     * @param string $template_raw - Contains a mix of {CLASS} and %s/%d annotations.
     * @param int $remediation_difficulty
     * @param int $type_id (unique integer id for $type)
     */
    public function __construct(
        string $type,
        int $category,
        int $severity,
        string $template_raw,
        int $remediation_difficulty,
        int $type_id
    ) {
        $this->type = $type;
        $this->category = $category;
        $this->severity = $severity;
        $this->template_raw = $template_raw;
        $this->template = self::templateToFormatString($template_raw);
        $this->remediation_difficulty = $remediation_difficulty;
        $this->type_id = $type_id;
    }

    private static function templateToFormatString(
        string $template
    ) : string {
        /** @param string[] $matches */
        return preg_replace_callback('/{([A-Z_]+)}/', function(array $matches) use($template): string {
            $key = $matches[1];
            $replacement_exists = array_key_exists($key, self::uncolored_format_string_for_template);
            if (!$replacement_exists) {
                error_log(sprintf("No coloring info for issue message (%s), key {%s}. Valid template types: %s",
                    $template, $key, implode(', ', array_keys(self::uncolored_format_string_for_template))));
                return '%s';
            }
            return self::uncolored_format_string_for_template[$key];
        }, $template);
    }

    /**
     * @return Issue[]
     */
    public static function issueMap()
    {
        static $error_map;

        if (!empty($error_map)) {
            return $error_map;
        }

        /**
         * @var Issue[]
         * Note: All type ids should be unique, and be grouped by the category.
         * (E.g. If the category is (1 << x), then the type_id should be x*1000 + y
         * If new type ids are added, existing ones should not be changed.
         */
        $error_list = [
            new Issue(
                self::SyntaxError,
                self::CATEGORY_UNDEFINED,
                self::SEVERITY_CRITICAL,
                "%s",
                self::REMEDIATION_A,
                1
            ),

            // Issue::CATEGORY_UNDEFINED
            new Issue(
                self::EmptyFile,
                self::CATEGORY_UNDEFINED,
                self::SEVERITY_LOW,
                "Empty file {FILE}",
                self::REMEDIATION_B,
                1000
            ),
            new Issue(
                self::ParentlessClass,
                self::CATEGORY_UNDEFINED,
                self::SEVERITY_CRITICAL,
                "Reference to parent of class {CLASS} that does not extend anything",
                self::REMEDIATION_B,
                1001
            ),
            new Issue(
                self::UndeclaredClass,
                self::CATEGORY_UNDEFINED,
                self::SEVERITY_CRITICAL,
                "Reference to undeclared class {CLASS}",
                self::REMEDIATION_B,
                1002
            ),
            new Issue(
                self::UndeclaredExtendedClass,
                self::CATEGORY_UNDEFINED,
                self::SEVERITY_CRITICAL,
                "Class extends undeclared class {CLASS}",
                self::REMEDIATION_B,
                1003
            ),
            new Issue(
                self::UndeclaredInterface,
                self::CATEGORY_UNDEFINED,
                self::SEVERITY_CRITICAL,
                "Class implements undeclared interface {CLASS}",
                self::REMEDIATION_B,
                1004
            ),
            new Issue(
                self::UndeclaredTrait,
                self::CATEGORY_UNDEFINED,
                self::SEVERITY_CRITICAL,
                "Class uses undeclared trait {TRAIT}",
                self::REMEDIATION_B,
                1005
            ),
            new Issue(
                self::UndeclaredClassCatch,
                self::CATEGORY_UNDEFINED,
                self::SEVERITY_CRITICAL,
                "Catching undeclared class {CLASS}",
                self::REMEDIATION_B,
                1006
            ),
            new Issue(
                self::UndeclaredClassConstant,
                self::CATEGORY_UNDEFINED,
                self::SEVERITY_CRITICAL,
                "Reference to constant {CONST} from undeclared class {CLASS}",
                self::REMEDIATION_B,
                1007
            ),
            new Issue(
                self::UndeclaredClassInstanceof,
                self::CATEGORY_UNDEFINED,
                self::SEVERITY_CRITICAL,
                "Checking instanceof against undeclared class {CLASS}",
                self::REMEDIATION_B,
                1008
            ),
            new Issue(
                self::UndeclaredClassMethod,
                self::CATEGORY_UNDEFINED,
                self::SEVERITY_CRITICAL,
                "Call to method {METHOD} from undeclared class {CLASS}",
                self::REMEDIATION_B,
                1009
            ),
            new Issue(
                self::UndeclaredClassReference,
                self::CATEGORY_UNDEFINED,
                self::SEVERITY_NORMAL,
                "Reference to undeclared class {CLASS}",
                self::REMEDIATION_B,
                1010
            ),
            new Issue(
                self::UndeclaredConstant,
                self::CATEGORY_UNDEFINED,
                self::SEVERITY_NORMAL,
                "Reference to undeclared constant {CONST}",
                self::REMEDIATION_B,
                1011
            ),
            new Issue(
                self::UndeclaredFunction,
                self::CATEGORY_UNDEFINED,
                self::SEVERITY_CRITICAL,
                "Call to undeclared function {FUNCTION}",
                self::REMEDIATION_B,
                1012
            ),
            new Issue(
                self::UndeclaredMethod,
                self::CATEGORY_UNDEFINED,
                self::SEVERITY_NORMAL,
                "Call to undeclared method {METHOD}",
                self::REMEDIATION_B,
                1013
            ),
            new Issue(
                self::UndeclaredStaticMethod,
                self::CATEGORY_UNDEFINED,
                self::SEVERITY_NORMAL,
                "Static call to undeclared method {METHOD}",
                self::REMEDIATION_B,
                1014
            ),
            new Issue(
                self::UndeclaredProperty,
                self::CATEGORY_UNDEFINED,
                self::SEVERITY_NORMAL,
                "Reference to undeclared property {PROPERTY}",
                self::REMEDIATION_B,
                1015
            ),
            new Issue(
                self::UndeclaredStaticProperty,
                self::CATEGORY_UNDEFINED,
                self::SEVERITY_CRITICAL,
                "Static property '{PROPERTY}' on {CLASS} is undeclared",
                self::REMEDIATION_B,
                1016
            ),
            new Issue(
                self::TraitParentReference,
                self::CATEGORY_UNDEFINED,
                self::SEVERITY_LOW,
                "Reference to parent from trait {TRAIT}",
                self::REMEDIATION_B,
                1017
            ),
            new Issue(
                self::UndeclaredVariable,
                self::CATEGORY_UNDEFINED,
                self::SEVERITY_NORMAL,
                "Variable \${VARIABLE} is undeclared",
                self::REMEDIATION_B,
                1018
            ),
            new Issue(
                self::UndeclaredTypeParameter,
                self::CATEGORY_UNDEFINED,
                self::SEVERITY_NORMAL,
                "Parameter of undeclared type {TYPE}",
                self::REMEDIATION_B,
                1019
            ),
            new Issue(
                self::UndeclaredTypeProperty,
                self::CATEGORY_UNDEFINED,
                self::SEVERITY_NORMAL,
                "Property {PROPERTY} has undeclared type {TYPE}",
                self::REMEDIATION_B,
                1020
            ),
            new Issue(
                self::UndeclaredClosureScope,
                self::CATEGORY_UNDEFINED,
                self::SEVERITY_NORMAL,
                "Reference to undeclared class {CLASS} in PhanClosureScope",
                self::REMEDIATION_B,
                1021
            ),
            new Issue(
                self::ClassContainsAbstractMethod,
                self::CATEGORY_UNDEFINED,
                self::SEVERITY_NORMAL,
                "non-abstract class {CLASS} contains abstract method {METHOD} declared at {FILE}:{LINE}",
                self::REMEDIATION_B,
                1022
            ),
            new Issue(
                self::ClassContainsAbstractMethodInternal,
                self::CATEGORY_UNDEFINED,
                self::SEVERITY_NORMAL,
                "non-abstract class {CLASS} contains abstract internal method {METHOD}",
                self::REMEDIATION_B,
                1023
            ),
            new Issue(
                self::UndeclaredAliasedMethodOfTrait,
                self::CATEGORY_UNDEFINED,
                self::SEVERITY_CRITICAL,
                "Alias {METHOD} was defined for a method {METHOD} which does not exist in trait {TRAIT}",
                self::REMEDIATION_B,
                1024
            ),
            new Issue(
                self::RequiredTraitNotAdded,
                self::CATEGORY_UNDEFINED,
                self::SEVERITY_NORMAL,
                "Required trait {TRAIT} for trait adaptation was not added to class",
                self::REMEDIATION_B,
                1025
            ),
            new Issue(
                self::AmbiguousTraitAliasSource,
                self::CATEGORY_UNDEFINED,
                self::SEVERITY_NORMAL,
                "Trait alias {METHOD} has an ambiguous source method {METHOD} with more than one possible source trait. Possibilities: {TRAIT}",
                self::REMEDIATION_B,
                1026
            ),

            // Issue::CATEGORY_ANALYSIS
            new Issue(
                self::Unanalyzable,
                self::CATEGORY_ANALYSIS,
                self::SEVERITY_LOW,
                "Expression is unanalyzable or feature is unimplemented. Please create an issue at https://github.com/etsy/phan/issues/new.",
                self::REMEDIATION_B,
                2000
            ),

            // Issue::CATEGORY_TYPE
            new Issue(
                self::TypeMismatchProperty,
                self::CATEGORY_TYPE,
                self::SEVERITY_NORMAL,
                "Assigning {TYPE} to property but {PROPERTY} is {TYPE}",
                self::REMEDIATION_B,
                10001
            ),
            new Issue(
                self::TypeMismatchDefault,
                self::CATEGORY_TYPE,
                self::SEVERITY_NORMAL,
                "Default value for {TYPE} \${VARIABLE} can't be {TYPE}",
                self::REMEDIATION_B,
                10002
            ),
            new Issue(
                self::TypeMismatchVariadicComment,
                self::CATEGORY_TYPE,
                self::SEVERITY_LOW,
                "{PARAMETER} is variadic in comment, but not variadic in param ({PARAMETER})",
                self::REMEDIATION_B,
                10021
            ),
            new Issue(
                self::TypeMismatchVariadicParam,
                self::CATEGORY_TYPE,
                self::SEVERITY_LOW,
                "{PARAMETER} is not variadic in comment, but variadic in param ({PARAMETER})",
                self::REMEDIATION_B,
                10022
            ),
            new Issue(
                self::TypeMismatchArgument,
                self::CATEGORY_TYPE,
                self::SEVERITY_NORMAL,
                "Argument {INDEX} ({VARIABLE}) is {TYPE} but {FUNCTIONLIKE}() takes {TYPE} defined at {FILE}:{LINE}",
                self::REMEDIATION_B,
                10003
            ),
            new Issue(
                self::TypeMismatchArgumentInternal,
                self::CATEGORY_TYPE,
                self::SEVERITY_NORMAL,
                "Argument {INDEX} ({VARIABLE}) is {TYPE} but {FUNCTIONLIKE}() takes {TYPE}",
                self::REMEDIATION_B,
                10004
            ),
            new Issue(
                self::TypeMismatchReturn,
                self::CATEGORY_TYPE,
                self::SEVERITY_NORMAL,
                "Returning type {TYPE} but {FUNCTIONLIKE}() is declared to return {TYPE}",
                self::REMEDIATION_B,
                10005
            ),
            new Issue(
                self::TypeMismatchDeclaredReturn,
                self::CATEGORY_TYPE,
                self::SEVERITY_NORMAL,
                "Doc-block declares return type {TYPE} which is incompatible with the return type {TYPE} declared in the signature",
                self::REMEDIATION_B,
                10020
            ),
            new Issue(
                self::TypeMissingReturn,
                self::CATEGORY_TYPE,
                self::SEVERITY_NORMAL,
                "Method {METHOD} is declared to return {TYPE} but has no return value",
                self::REMEDIATION_B,
                10006
            ),
            new Issue(
                self::TypeMismatchForeach,
                self::CATEGORY_TYPE,
                self::SEVERITY_NORMAL,
                "{TYPE} passed to foreach instead of array",
                self::REMEDIATION_B,
                10007
            ),
            new Issue(
                self::TypeArrayOperator,
                self::CATEGORY_TYPE,
                self::SEVERITY_NORMAL,
                "Invalid array operator between types {TYPE} and {TYPE}",
                self::REMEDIATION_B,
                10008
            ),
            new Issue(
                self::TypeArraySuspicious,
                self::CATEGORY_TYPE,
                self::SEVERITY_NORMAL,
                "Suspicious array access to {TYPE}",
                self::REMEDIATION_B,
                10009
            ),
            new Issue(
                self::TypeComparisonToArray,
                self::CATEGORY_TYPE,
                self::SEVERITY_LOW,
                "{TYPE} to array comparison",
                self::REMEDIATION_B,
                10010
            ),
            new Issue(
                self::TypeComparisonFromArray,
                self::CATEGORY_TYPE,
                self::SEVERITY_LOW,
                "array to {TYPE} comparison",
                self::REMEDIATION_B,
                10011
            ),
            new Issue(
                self::TypeConversionFromArray,
                self::CATEGORY_TYPE,
                self::SEVERITY_LOW,
                "array to {TYPE} conversion",
                self::REMEDIATION_B,
                10012
            ),
            new Issue(
                self::TypeInstantiateAbstract,
                self::CATEGORY_TYPE,
                self::SEVERITY_NORMAL,
                "Instantiation of abstract class {TYPE}",
                self::REMEDIATION_B,
                10013
            ),
            new Issue(
                self::TypeInstantiateInterface,
                self::CATEGORY_TYPE,
                self::SEVERITY_NORMAL,
                "Instantiation of interface {INTERFACE}",
                self::REMEDIATION_B,
                10014
            ),
            new Issue(
                self::TypeInvalidClosureScope,
                self::CATEGORY_TYPE,
                self::SEVERITY_NORMAL,
                "Invalid PhanClosureScope: expected a class name, got {TYPE}",
                self::REMEDIATION_B,
                10023
            ),
            new Issue(
                self::TypeInvalidRightOperand,
                self::CATEGORY_TYPE,
                self::SEVERITY_NORMAL,
                "Invalid operator: left operand is array and right is not",
                self::REMEDIATION_B,
                10015
            ),
            new Issue(
                self::TypeInvalidLeftOperand,
                self::CATEGORY_TYPE,
                self::SEVERITY_NORMAL,
                "Invalid operator: right operand is array and left is not",
                self::REMEDIATION_B,
                10016
            ),
            new Issue(
                self::TypeParentConstructorCalled,
                self::CATEGORY_TYPE,
                self::SEVERITY_NORMAL,
                "Must call parent::__construct() from {CLASS} which extends {CLASS}",
                self::REMEDIATION_B,
                10017
            ),
            new Issue(
                self::TypeNonVarPassByRef,
                self::CATEGORY_TYPE,
                self::SEVERITY_NORMAL,
                "Only variables can be passed by reference at argument {INDEX} of {FUNCTIONLIKE}()",
                self::REMEDIATION_B,
                10018
            ),
            new Issue(
                self::NonClassMethodCall,
                self::CATEGORY_TYPE,
                self::SEVERITY_CRITICAL,
                "Call to method {METHOD} on non-class type {TYPE}",
                self::REMEDIATION_B,
                10019
            ),
            new Issue(
                self::TypeVoidAssignment,
                self::CATEGORY_TYPE,
                self::SEVERITY_LOW,
                "Cannot assign void return value",
                self::REMEDIATION_B,
                10000
            ),
            new Issue(
                self::TypeSuspiciousIndirectVariable,
                self::CATEGORY_TYPE,
                self::SEVERITY_NORMAL,
                'Indirect variable ${(expr)} has invalid inner expression type {TYPE}, expected string/integer',
                self::REMEDIATION_B,
                10023
            ),

            // Issue::CATEGORY_VARIABLE
            new Issue(
                self::VariableUseClause,
                self::CATEGORY_VARIABLE,
                self::SEVERITY_NORMAL,
                "Non-variables not allowed within use clause",
                self::REMEDIATION_B,
                12000
            ),

            // Issue::CATEGORY_STATIC
            new Issue(
                self::StaticCallToNonStatic,
                self::CATEGORY_STATIC,
                self::SEVERITY_NORMAL,
                "Static call to non-static method {METHOD} defined at {FILE}:{LINE}",
                self::REMEDIATION_B,
                9000
            ),

            // Issue::CATEGORY_CONTEXT
            new Issue(
                self::ContextNotObject,
                self::CATEGORY_CONTEXT,
                self::SEVERITY_CRITICAL,
                "Cannot access {CLASS} when not in object context",
                self::REMEDIATION_B,
                4000
            ),

            // Issue::CATEGORY_DEPRECATED
            new Issue(
                self::DeprecatedFunction,
                self::CATEGORY_DEPRECATED,
                self::SEVERITY_NORMAL,
                "Call to deprecated function {FUNCTIONLIKE}() defined at {FILE}:{LINE}",
                self::REMEDIATION_B,
                5000
            ),
            new Issue(
                self::DeprecatedFunctionInternal,
                self::CATEGORY_DEPRECATED,
                self::SEVERITY_NORMAL,
                "Call to deprecated function {FUNCTIONLIKE}()",
                self::REMEDIATION_B,
                5005
            ),
            new Issue(
                self::DeprecatedClass,
                self::CATEGORY_DEPRECATED,
                self::SEVERITY_NORMAL,
                "Call to deprecated class {CLASS} defined at {FILE}:{LINE}",
                self::REMEDIATION_B,
                5001
            ),
            new Issue(
                self::DeprecatedProperty,
                self::CATEGORY_DEPRECATED,
                self::SEVERITY_NORMAL,
                "Reference to deprecated property {PROPERTY} defined at {FILE}:{LINE}",
                self::REMEDIATION_B,
                5002
            ),
            new Issue(
                self::DeprecatedInterface,
                self::CATEGORY_DEPRECATED,
                self::SEVERITY_NORMAL,
                "Using a deprecated interface {INTERFACE} defined at {FILE}:{LINE}",
                self::REMEDIATION_B,
                5003
            ),
            new Issue(
                self::DeprecatedTrait,
                self::CATEGORY_DEPRECATED,
                self::SEVERITY_NORMAL,
                "Using a deprecated trait {TRAIT} defined at {FILE}:{LINE}",
                self::REMEDIATION_B,
                5004
            ),

            // Issue::CATEGORY_PARAMETER
            new Issue(
                self::ParamReqAfterOpt,
                self::CATEGORY_PARAMETER,
                self::SEVERITY_LOW,
                "Required argument follows optional",
                self::REMEDIATION_B,
                7000
            ),
            new Issue(
                self::ParamTooMany,
                self::CATEGORY_PARAMETER,
                self::SEVERITY_LOW,
                "Call with {COUNT} arg(s) to {FUNCTIONLIKE}() which only takes {COUNT} arg(s) defined at {FILE}:{LINE}",
                self::REMEDIATION_B,
                7001
            ),
            new Issue(
                self::ParamTooManyInternal,
                self::CATEGORY_PARAMETER,
                self::SEVERITY_LOW,
                "Call with {COUNT} arg(s) to {FUNCTIONLIKE}() which only takes {COUNT} arg(s)",
                self::REMEDIATION_B,
                7002
            ),
            new Issue(
                self::ParamTooFew,
                self::CATEGORY_PARAMETER,
                self::SEVERITY_NORMAL,
                "Call with {COUNT} arg(s) to {FUNCTIONLIKE}() which requires {COUNT} arg(s) defined at {FILE}:{LINE}",
                self::REMEDIATION_B,
                7003
            ),
            new Issue(
                self::ParamTooFewInternal,
                self::CATEGORY_PARAMETER,
                self::SEVERITY_NORMAL,
                "Call with {COUNT} arg(s) to {FUNCTIONLIKE}() which requires {COUNT} arg(s)",
                self::REMEDIATION_B,
                7004
            ),
            new Issue(
                self::ParamSpecial1,
                self::CATEGORY_PARAMETER,
                self::SEVERITY_NORMAL,
                "Argument {INDEX} ({PARAMETER}) is {TYPE} but {FUNCTIONLIKE}() takes {TYPE} when argument {INDEX} is {TYPE}",
                self::REMEDIATION_B,
                7005
            ),
            new Issue(
                self::ParamSpecial2,
                self::CATEGORY_PARAMETER,
                self::SEVERITY_NORMAL,
                "Argument {INDEX} ({PARAMETER}) is {TYPE} but {FUNCTIONLIKE}() takes {TYPE} when passed only one argument",
                self::REMEDIATION_B,
                7006
            ),
            new Issue(
                self::ParamSpecial3,
                self::CATEGORY_PARAMETER,
                self::SEVERITY_NORMAL,
                "The last argument to {FUNCTIONLIKE} must be of type {TYPE}",
                self::REMEDIATION_B,
                7007
            ),
            new Issue(
                self::ParamSpecial4,
                self::CATEGORY_PARAMETER,
                self::SEVERITY_NORMAL,
                "The second to last argument to {FUNCTIONLIKE} must be of type {TYPE}",
                self::REMEDIATION_B,
                7008
            ),
            new Issue(
                self::ParamTypeMismatch,
                self::CATEGORY_PARAMETER,
                self::SEVERITY_NORMAL,
                "Argument {INDEX} is {TYPE} but {FUNCTIONLIKE}() takes {TYPE}",
                self::REMEDIATION_B,
                7009
            ),
            new Issue(
                self::ParamSignatureMismatch,
                self::CATEGORY_PARAMETER,
                self::SEVERITY_NORMAL,
                "Declaration of {METHOD} should be compatible with {METHOD} defined in {FILE}:{LINE}",
                self::REMEDIATION_B,
                7010
            ),
            new Issue(
                self::ParamSignatureMismatchInternal,
                self::CATEGORY_PARAMETER,
                self::SEVERITY_NORMAL,
                "Declaration of {METHOD} should be compatible with internal {METHOD}",
                self::REMEDIATION_B,
                7011
            ),
            new Issue(
                self::ParamRedefined,
                self::CATEGORY_PARAMETER,
                self::SEVERITY_NORMAL,
                "Redefinition of parameter {PARAMETER}",
                self::REMEDIATION_B,
                7012
            ),
            // TODO: Optionally, change the other message to say that it's based off of phpdoc and LSP in a future PR.
            // NOTE: Incompatibilities in the param list are SEVERITY_NORMAL, because the php interpreter emits a notice.
            // Incompatibilities in the return types are SEVERITY_CRITICAL, because the php interpreter will throw an Error.
            new Issue(
                self::ParamSignatureRealMismatchReturnType,
                self::CATEGORY_PARAMETER,
                self::SEVERITY_CRITICAL,
                "Declaration of {METHOD} should be compatible with {METHOD} (method returning '{TYPE}' cannot override method returning '{TYPE}') defined in {FILE}:{LINE}",
                self::REMEDIATION_B,
                7013
            ),
            new Issue(
                self::ParamSignatureRealMismatchReturnTypeInternal,
                self::CATEGORY_PARAMETER,
                self::SEVERITY_CRITICAL,
                "Declaration of {METHOD} should be compatible with internal {METHOD} (method returning '{TYPE}' cannot override method returning '{TYPE}')",
                self::REMEDIATION_B,
                7014
            ),
            new Issue(
                self::ParamSignatureRealMismatchParamType,
                self::CATEGORY_PARAMETER,
                self::SEVERITY_NORMAL,
                "Declaration of {METHOD} should be compatible with {METHOD} (parameter #{INDEX} of type '{TYPE}' cannot replace original parameter of type '{TYPE}') defined in {FILE}:{LINE}",
                self::REMEDIATION_B,
                7015
            ),
            new Issue(
                self::ParamSignatureRealMismatchParamTypeInternal,
                self::CATEGORY_PARAMETER,
                self::SEVERITY_NORMAL,
                "Declaration of {METHOD} should be compatible with internal {METHOD} (parameter #{INDEX} of type '{TYPE}' cannot replace original parameter of type '{TYPE}')",
                self::REMEDIATION_B,
                7016
            ),
            new Issue(
                self::ParamSignatureRealMismatchHasParamType,
                self::CATEGORY_PARAMETER,
                self::SEVERITY_NORMAL,
                "Declaration of {METHOD} should be compatible with {METHOD} (parameter #{INDEX} of has type '{TYPE}' cannot replace original parameter with no type) defined in {FILE}:{LINE}",
                self::REMEDIATION_B,
                7017
            ),
            new Issue(
                self::ParamSignatureRealMismatchHasParamTypeInternal,
                self::CATEGORY_PARAMETER,
                self::SEVERITY_NORMAL,
                "Declaration of {METHOD} should be compatible with internal {METHOD} (parameter #{INDEX} of has type '{TYPE}' cannot replace original parameter with no type)",
                self::REMEDIATION_B,
                7018
            ),
            new Issue(
                self::ParamSignatureRealMismatchHasNoParamType,
                self::CATEGORY_PARAMETER,
                self::SEVERITY_NORMAL,
                "Declaration of {METHOD} should be compatible with {METHOD} (parameter #{INDEX} with no type cannot replace original parameter with type '{TYPE}') defined in {FILE}:{LINE}",
                self::REMEDIATION_B,
                7019
            ),
            new Issue(
                self::ParamSignatureRealMismatchHasNoParamTypeInternal,
                self::CATEGORY_PARAMETER,
                self::SEVERITY_NORMAL,
                "Declaration of {METHOD} should be compatible with internal {METHOD} (parameter #{INDEX} with no type cannot replace original parameter with type '{TYPE}')",
                self::REMEDIATION_B,
                7020
            ),
            new Issue(
                self::ParamSignatureRealMismatchParamVariadic,
                self::CATEGORY_PARAMETER,
                self::SEVERITY_NORMAL,
                "Declaration of {METHOD} should be compatible with {METHOD} (parameter #{INDEX} is a variadic parameter replacing a non-variadic parameter) defined in {FILE}:{LINE}",
                self::REMEDIATION_B,
                7021
            ),
            new Issue(
                self::ParamSignatureRealMismatchParamVariadicInternal,
                self::CATEGORY_PARAMETER,
                self::SEVERITY_NORMAL,
                "Declaration of {METHOD} should be compatible with internal {METHOD} (parameter #{INDEX} is a variadic parameter replacing a non-variadic parameter)",
                self::REMEDIATION_B,
                7022
            ),
            new Issue(
                self::ParamSignatureRealMismatchParamNotVariadic,
                self::CATEGORY_PARAMETER,
                self::SEVERITY_NORMAL,
                "Declaration of {METHOD} should be compatible with {METHOD} (parameter #{INDEX} is a non-variadic parameter replacing a variadic parameter) defined in {FILE}:{LINE}",
                self::REMEDIATION_B,
                7023
            ),
            new Issue(
                self::ParamSignatureRealMismatchParamNotVariadicInternal,
                self::CATEGORY_PARAMETER,
                self::SEVERITY_NORMAL,
                "Declaration of {METHOD} should be compatible with internal {METHOD} (parameter #{INDEX} is a non-variadic parameter replacing a variadic parameter)",
                self::REMEDIATION_B,
                7024
            ),
            new Issue(
                self::ParamSignatureRealMismatchParamIsReference,
                self::CATEGORY_PARAMETER,
                self::SEVERITY_NORMAL,
                "Declaration of {METHOD} should be compatible with {METHOD} (parameter #{INDEX} is a reference parameter overriding a non-reference parameter) defined in {FILE}:{LINE}",
                self::REMEDIATION_B,
                7025
            ),
            new Issue(
                self::ParamSignatureRealMismatchParamIsReferenceInternal,
                self::CATEGORY_PARAMETER,
                self::SEVERITY_NORMAL,
                "Declaration of {METHOD} should be compatible with internal {METHOD} (parameter #{INDEX} is a reference parameter overriding a non-reference parameter)",
                self::REMEDIATION_B,
                7026
            ),
            new Issue(
                self::ParamSignatureRealMismatchParamIsNotReference,
                self::CATEGORY_PARAMETER,
                self::SEVERITY_NORMAL,
                "Declaration of {METHOD} should be compatible with {METHOD} (parameter #{INDEX} is a non-reference parameter overriding a reference parameter) defined in {FILE}:{LINE}",
                self::REMEDIATION_B,
                7027
            ),
            new Issue(
                self::ParamSignatureRealMismatchParamIsNotReferenceInternal,
                self::CATEGORY_PARAMETER,
                self::SEVERITY_NORMAL,
                "Declaration of {METHOD} should be compatible with internal {METHOD} (parameter #{INDEX} is a non-reference parameter overriding a reference parameter)",
                self::REMEDIATION_B,
                7028
            ),
            new Issue(
                self::ParamSignatureRealMismatchTooFewParameters,
                self::CATEGORY_PARAMETER,
                self::SEVERITY_NORMAL,
                "Declaration of {METHOD} should be compatible with {METHOD} (the method override accepts {COUNT} parameter(s), but the overridden method can accept {COUNT}) defined in {FILE}:{LINE}",
                self::REMEDIATION_B,
                7029
            ),
            new Issue(
                self::ParamSignatureRealMismatchTooFewParametersInternal,
                self::CATEGORY_PARAMETER,
                self::SEVERITY_NORMAL,
                "Declaration of {METHOD} should be compatible with internal {METHOD} (the method override accepts {COUNT} parameter(s), but the overridden method can accept {COUNT})",
                self::REMEDIATION_B,
                7030
            ),
            new Issue(
                self::ParamSignatureRealMismatchTooManyRequiredParameters,
                self::CATEGORY_PARAMETER,
                self::SEVERITY_NORMAL,
                "Declaration of {METHOD} should be compatible with {METHOD} (the method override requires {COUNT} parameter(s), but the overridden method requires only {COUNT}) defined in {FILE}:{LINE}",
                self::REMEDIATION_B,
                7031
            ),
            new Issue(
                self::ParamSignatureRealMismatchTooManyRequiredParametersInternal,
                self::CATEGORY_PARAMETER,
                self::SEVERITY_NORMAL,
                "Declaration of {METHOD} should be compatible with internal {METHOD} (the method override requires {COUNT} parameter(s), but the overridden method requires only {COUNT})",
                self::REMEDIATION_B,
                7032
            ),

            // Issue::CATEGORY_NOOP
            new Issue(
                self::NoopProperty,
                self::CATEGORY_NOOP,
                self::SEVERITY_LOW,
                "Unused property",
                self::REMEDIATION_B,
                6000
            ),
            new Issue(
                self::NoopArray,
                self::CATEGORY_NOOP,
                self::SEVERITY_LOW,
                "Unused array",
                self::REMEDIATION_B,
                6001
            ),
            new Issue(
                self::NoopConstant,
                self::CATEGORY_NOOP,
                self::SEVERITY_LOW,
                "Unused constant",
                self::REMEDIATION_B,
                6002
            ),
            new Issue(
                self::NoopClosure,
                self::CATEGORY_NOOP,
                self::SEVERITY_LOW,
                "Unused closure",
                self::REMEDIATION_B,
                6003
            ),
            new Issue(
                self::NoopVariable,
                self::CATEGORY_NOOP,
                self::SEVERITY_LOW,
                "Unused variable",
                self::REMEDIATION_B,
                6004
            ),
            new Issue(
                self::UnreferencedClass,
                self::CATEGORY_NOOP,
                self::SEVERITY_NORMAL,
                "Possibly zero references to class {CLASS}",
                self::REMEDIATION_B,
                6005
            ),
            new Issue(
                self::UnreferencedMethod,
                self::CATEGORY_NOOP,
                self::SEVERITY_NORMAL,
                "Possibly zero references to method {METHOD}",
                self::REMEDIATION_B,
                6006
            ),
            new Issue(
                self::UnreferencedProperty,
                self::CATEGORY_NOOP,
                self::SEVERITY_NORMAL,
                "Possibly zero references to property {PROPERTY}",
                self::REMEDIATION_B,
                6007
            ),
            new Issue(
                self::UnreferencedConstant,
                self::CATEGORY_NOOP,
                self::SEVERITY_NORMAL,
                "Possibly zero references to constant {CONST}",
                self::REMEDIATION_B,
                6008
            ),

            // Issue::CATEGORY_REDEFINE
            new Issue(
                self::RedefineClass,
                self::CATEGORY_REDEFINE,
                self::SEVERITY_NORMAL,
                "{CLASS} defined at {FILE}:{LINE} was previously defined as {CLASS} at {FILE}:{LINE}",
                self::REMEDIATION_B,
                8000
            ),
            new Issue(
                self::RedefineClassInternal,
                self::CATEGORY_REDEFINE,
                self::SEVERITY_NORMAL,
                "{CLASS} defined at {FILE}:{LINE} was previously defined as {CLASS} internally",
                self::REMEDIATION_B,
                8001
            ),
            new Issue(
                self::RedefineFunction,
                self::CATEGORY_REDEFINE,
                self::SEVERITY_NORMAL,
                "Function {FUNCTION} defined at {FILE}:{LINE} was previously defined at {FILE}:{LINE}",
                self::REMEDIATION_B,
                8002
            ),
            new Issue(
                self::RedefineFunctionInternal,
                self::CATEGORY_REDEFINE,
                self::SEVERITY_NORMAL,
                "Function {FUNCTION} defined at {FILE}:{LINE} was previously defined internally",
                self::REMEDIATION_B,
                8003
            ),
            new Issue(
                self::IncompatibleCompositionProp,
                self::CATEGORY_REDEFINE,
                self::SEVERITY_NORMAL,
                "{TRAIT} and {TRAIT} define the same property ({PROPERTY}) in the composition of {CLASS}. However, the definition differs and is considered incompatible. Class was composed in {FILE} on line {LINE}",
                self::REMEDIATION_B,
                8004
            ),
            new Issue(
                self::IncompatibleCompositionMethod,
                self::CATEGORY_REDEFINE,
                self::SEVERITY_NORMAL,
                "Declaration of {METHOD} must be compatible with {METHOD} in {FILE} on line {LINE}",
                self::REMEDIATION_B,
                8005
            ),

            // Issue::CATEGORY_ACCESS
            new Issue(
                self::AccessPropertyProtected,
                self::CATEGORY_ACCESS,
                self::SEVERITY_CRITICAL,
                "Cannot access protected property {PROPERTY}",
                self::REMEDIATION_B,
                1000
            ),
            new Issue(
                self::AccessPropertyPrivate,
                self::CATEGORY_ACCESS,
                self::SEVERITY_CRITICAL,
                "Cannot access private property {PROPERTY}",
                self::REMEDIATION_B,
                1001
            ),
            new Issue(
                self::AccessMethodProtected,
                self::CATEGORY_ACCESS,
                self::SEVERITY_CRITICAL,
                "Cannot access protected method {METHOD} defined at {FILE}:{LINE}",
                self::REMEDIATION_B,
                1002
            ),
            new Issue(
                self::AccessMethodPrivate,
                self::CATEGORY_ACCESS,
                self::SEVERITY_CRITICAL,
                "Cannot access private method {METHOD} defined at {FILE}:{LINE}",
                self::REMEDIATION_B,
                1003
            ),
            new Issue(
                self::AccessSignatureMismatch,
                self::CATEGORY_ACCESS,
                self::SEVERITY_NORMAL,
                "Access level to {METHOD} must be compatible with {METHOD} defined in {FILE}:{LINE}",
                self::REMEDIATION_B,
                1004
            ),
            new Issue(
                self::AccessSignatureMismatchInternal,
                self::CATEGORY_ACCESS,
                self::SEVERITY_NORMAL,
                "Access level to {METHOD} must be compatible with internal {METHOD}",
                self::REMEDIATION_B,
                1005
            ),
            new Issue(
                self::AccessStaticToNonStatic,
                self::CATEGORY_ACCESS,
                self::SEVERITY_CRITICAL,
                "Cannot make static method {METHOD}() non static",
                self::REMEDIATION_B,
                1006
            ),
            new Issue(
                self::AccessNonStaticToStatic,
                self::CATEGORY_ACCESS,
                self::SEVERITY_CRITICAL,
                "Cannot make non static method {METHOD}() static",
                self::REMEDIATION_B,
                1007
            ),
            new Issue(
                self::AccessClassConstantPrivate,
                self::CATEGORY_ACCESS,
                self::SEVERITY_CRITICAL,
                "Cannot access private class constant {CONST} defined at {FILE}:{LINE}",
                self::REMEDIATION_B,
                1008
            ),
            new Issue(
                self::AccessClassConstantProtected,
                self::CATEGORY_ACCESS,
                self::SEVERITY_CRITICAL,
                "Cannot access protected class constant {CONST} defined at {FILE}:{LINE}",
                self::REMEDIATION_B,
                1009
            ),
            new Issue(
                self::AccessPropertyStaticAsNonStatic,
                self::CATEGORY_ACCESS,
                self::SEVERITY_CRITICAL,
                "Accessing static property %s as non static",
                self::REMEDIATION_B,
                1010
            ),
            new Issue(
                self::AccessMethodProtectedWithCallMagicMethod,
                self::CATEGORY_ACCESS,
                self::SEVERITY_CRITICAL,
                "Cannot access protected method {METHOD} defined at {FILE}:{LINE} (if this call should be handled by __call, consider adding a @method tag to the class)",
                self::REMEDIATION_B,
                1011
            ),
            new Issue(
                self::AccessMethodPrivateWithCallMagicMethod,
                self::CATEGORY_ACCESS,
                self::SEVERITY_CRITICAL,
                "Cannot access private method {METHOD} defined at {FILE}:{LINE} (if this call should be handled by __call, consider adding a @method tag to the class)",
                self::REMEDIATION_B,
                1012
            ),

            // Issue::CATEGORY_COMPATIBLE
            new Issue(
                self::CompatiblePHP7,
                self::CATEGORY_COMPATIBLE,
                self::SEVERITY_NORMAL,
                "Expression may not be PHP 7 compatible",
                self::REMEDIATION_B,
                3000
            ),
            new Issue(
                self::CompatibleExpressionPHP7,
                self::CATEGORY_COMPATIBLE,
                self::SEVERITY_NORMAL,
                "{CLASS} expression may not be PHP 7 compatible",
                self::REMEDIATION_B,
                3001
            ),

            // Issue::CATEGORY_GENERIC
            new Issue(
                self::TemplateTypeConstant,
                self::CATEGORY_GENERIC,
                self::SEVERITY_NORMAL,
                "constant {CONST} may not have a template type",
                self::REMEDIATION_B,
                14000
            ),
            new Issue(
                self::TemplateTypeStaticMethod,
                self::CATEGORY_GENERIC,
                self::SEVERITY_NORMAL,
                "static method {METHOD} may not use template types",
                self::REMEDIATION_B,
                14001
            ),
            new Issue(
                self::TemplateTypeStaticProperty,
                self::CATEGORY_GENERIC,
                self::SEVERITY_NORMAL,
                "static property {PROPERTY} may not have a template type",
                self::REMEDIATION_B,
                14002
            ),
            new Issue(
                self::GenericGlobalVariable,
                self::CATEGORY_GENERIC,
                self::SEVERITY_NORMAL,
                "Global variable {VARIABLE} may not be assigned an instance of a generic class",
                self::REMEDIATION_B,
                14003
            ),
            new Issue(
                self::GenericConstructorTypes,
                self::CATEGORY_GENERIC,
                self::SEVERITY_NORMAL,
                "Missing template parameters {PARAMETER} on constructor for generic class {CLASS}",
                self::REMEDIATION_B,
                14004
            ),

            // Issue::CATEGORY_INTERNAL
            new Issue(
                self::AccessConstantInternal,
                self::CATEGORY_INTERNAL,
                self::SEVERITY_NORMAL,
                "Cannot access internal constant {CONST} of namepace {NAMESPACE} defined at {FILE}:{LINE} from namespace {NAMESPACE}",
                self::REMEDIATION_B,
                15000
            ),
            new Issue(
                self::AccessClassInternal,
                self::CATEGORY_INTERNAL,
                self::SEVERITY_NORMAL,
                "Cannot access internal {CLASS} defined at {FILE}:{LINE}",
                self::REMEDIATION_B,
                15001
            ),
            new Issue(
                self::AccessClassConstantInternal,
                self::CATEGORY_INTERNAL,
                self::SEVERITY_NORMAL,
                "Cannot access internal class constant {CONST} defined at {FILE}:{LINE}",
                self::REMEDIATION_B,
                15002
            ),
            new Issue(
                self::AccessPropertyInternal,
                self::CATEGORY_INTERNAL,
                self::SEVERITY_NORMAL,
                "Cannot access internal property {PROPERTY} of namespace {NAMESPACE} defined at {FILE}:{LINE} from namespace {NAMESPACE}",
                self::REMEDIATION_B,
                15003
            ),
            new Issue(
                self::AccessMethodInternal,
                self::CATEGORY_INTERNAL,
                self::SEVERITY_NORMAL,
                "Cannot access internal method {METHOD} of namespace {NAMESPACE} defined at {FILE}:{LINE} from namespace {NAMESPACE}",
                self::REMEDIATION_B,
                15004
            ),

            // Issue::CATEGORY_COMMENT
            new Issue(
                self::InvalidCommentForDeclarationType,
                self::CATEGORY_COMMENT,
                self::SEVERITY_LOW,
                "The phpdoc comment for {COMMENT} cannot occur on a {TYPE}",
                self::REMEDIATION_B,
                16000
            ),
            new Issue(
                self::MisspelledAnnotation,
                self::CATEGORY_COMMENT,
                self::SEVERITY_LOW,
                "Saw misspelled annotation {COMMENT}, should be {COMMENT}",
                self::REMEDIATION_B,
                16001
            ),
            new Issue(
                self::UnextractableAnnotation,
                self::CATEGORY_COMMENT,
                self::SEVERITY_LOW,
                "Saw unextractable annotation for comment {COMMENT}",
                self::REMEDIATION_B,
                16002
            ),
            new Issue(
                self::UnextractableAnnotationPart,
                self::CATEGORY_COMMENT,
                self::SEVERITY_LOW,
                "Saw unextractable annotation for a fragment of comment {COMMENT}: {COMMENT}",
                self::REMEDIATION_B,
                16003
            ),
            new Issue(
                self::CommentParamWithoutRealParam,
                self::CATEGORY_COMMENT,
                self::SEVERITY_LOW,
                "Saw an @param annotation for {VARIABLE}, but it was not found in the param list of {FUNCTIONLIKE}",
                self::REMEDIATION_B,
                16004
            ),
            new Issue(
                self::CommentParamOnEmptyParamList,
                self::CATEGORY_COMMENT,
                self::SEVERITY_LOW,
                "Saw an @param annotation for {VARIABLE}, but the param list of {FUNCTIONLIKE} is empty",
                self::REMEDIATION_B,
                16005
            ),
        ];

        $error_map = [];
        foreach ($error_list as $i => $error) {
            $error_type = $error->getType();
            assert(!array_key_exists($error_type, $error_map), "Issue of type $error_type has multiple definitions");
            $error_map[$error_type] = $error;
        }

        return $error_map;
    }

    /**
     * @return string
     */
    public function getType() : string
    {
        return $this->type;
    }

    /**
     * @return int (Unique integer code corresponding to getType())
     */
    public function getTypeId() : int
    {
        return $this->type_id;
    }

    /**
     * @return int
     */
    public function getCategory() : int
    {
        return $this->category;
    }

    /**
     * @return string
     * The name of the category
     */
    public static function getNameForCategory(int $category) : string
    {
        return self::CATEGORY_NAME[$category] ?? '';
    }

    /**
     * @return int
     */
    public function getSeverity() : int
    {
        return $this->severity;
    }

    /**
     * @return string
     * A descriptive name of the severity of hte issue
     */
    public function getSeverityName() : string
    {
        switch ($this->getSeverity()) {
        case self::SEVERITY_LOW:
            return 'low';
        case self::SEVERITY_NORMAL:
            return 'normal';
        case self::SEVERITY_CRITICAL:
            return 'critical';
        }
    }

    /**
     * @return int
     */
    public function getRemediationDifficulty() : int
    {
        return $this->remediation_difficulty;
    }


    /**
     * @return string
     */
    public function getTemplate() : string
    {
        return $this->template;
    }

    /**
     * @return string - template with the information needed to colorize this.
     */
    public function getTemplateRaw() : string
    {
        return $this->template_raw;
    }

    /**
     * @return IssueInstance
     */
    public function __invoke(
        string $file,
        int $line,
        array $template_parameters = []
    ) : IssueInstance {
        return new IssueInstance(
            $this,
            $file,
            $line,
            $template_parameters
        );
    }

    /**
     * return Issue
     */
    public static function fromType(string $type) : Issue
    {
        $error_map = self::issueMap();

        assert(
            !empty($error_map[$type]),
            "Undefined error type $type"
        );

        return $error_map[$type];
    }

    /**
     * @param string $type
     * The type of the issue
     *
     * @param string $file
     * The name of the file where the issue was found
     *
     * @param int $line
     * The line number (start) where the issue was found
     *
     * @param mixed ...$template_parameters
     * Any template parameters required for the issue
     * message
     *
     * @return void
     */
    public static function emit(
        string $type,
        string $file,
        int $line,
        ...$template_parameters
    ) {
        self::emitWithParameters(
            $type,
            $file,
            $line,
            $template_parameters
        );
    }

    /**
     * @param string $type
     * The type of the issue
     *
     * @param string $file
     * The name of the file where the issue was found
     *
     * @param int $line
     * The line number (start) where the issue was found
     *
     * @param array $template_parameters
     * Any template parameters required for the issue
     * message
     *
     * @return void
     */
    public static function emitWithParameters(
        string $type,
        string $file,
        int $line,
        array $template_parameters
    ) {
        $issue = self::fromType($type);

        self::emitInstance(
            $issue($file, $line, $template_parameters)
        );
    }

    /**
     * @param IssueInstance $issue_instance
     * An issue instance to emit
     *
     * @return void
     */
    public static function emitInstance(
        IssueInstance $issue_instance
    ) {
        Phan::getIssueCollector()->collectIssue($issue_instance);
    }

    /**
     * @param CodeBase $code_base
     * The code base within which we're operating
     *
     * @param Context $context
     * The context in which the instance was found
     *
     * @param IssueInstance $issue_instance
     * An issue instance to emit
     *
     * @return void
     */
    public static function maybeEmitInstance(
        CodeBase $code_base,
        Context $context,
        IssueInstance $issue_instance
    ) {
        // TODO: In daemonize mode, associate the issue with the file's modification date/contents, and clear issues when the file is modified.
        // Some issues are emitted while still in parse(ParseVisitor) phase.

        // If this issue type has been suppressed in
        // the config, ignore it

        $config = Config::get();
        if (!$config->disable_suppression) {
            if (in_array($issue_instance->getIssue()->getType(),
                    $config->suppress_issue_types ?? [])
            ) {
                return;
            }

            // If a white-list of allowed issue types is defined,
            // only emit issues on the white-list
            $whitelist_issue_types = $config->whitelist_issue_types ?? [];
            if (count($whitelist_issue_types) > 0
                && !in_array($issue_instance->getIssue()->getType(),
                        $whitelist_issue_types)
            ) {
                return;
            }

            // If this issue type has been suppressed in
            // this scope from a doc block, ignore it.
            if ($context->hasSuppressIssue(
                    $code_base,
                    $issue_instance->getIssue()->getType()
            )) {
                return;
            }
        }

        self::emitInstance($issue_instance);
    }

    /**
     * @param CodeBase $code_base
     * The code base within which we're operating
     *
     * @param Context $context
     * The context in which the node we're going to be looking
     * at exits.
     *
     * @param string $issue_type
     * The type of issue to emit such as Issue::ParentlessClass
     *
     * @param int $lineno
     * The line number where the issue was found
     *
     * @param mixed ...$parameters
     * Template parameters for the issue's error message
     *
     * @return void
     */
    public static function maybeEmit(
        CodeBase $code_base,
        Context $context,
        string $issue_type,
        int $lineno,
        ...$parameters
    ) {
        self::maybeEmitWithParameters(
            $code_base, $context, $issue_type, $lineno, $parameters
        );
    }

    /**
     * @param CodeBase $code_base
     * The code base within which we're operating
     *
     * @param Context $context
     * The context in which the node we're going to be looking
     * at exits.
     *
     * @param string $issue_type
     * The type of issue to emit such as Issue::ParentlessClass
     *
     * @param int $lineno
     * The line number where the issue was found
     *
     * @param array parameters
     * Template parameters for the issue's error message
     *
     * @return void
     */
    public static function maybeEmitWithParameters(
        CodeBase $code_base,
        Context $context,
        string $issue_type,
        int $lineno,
        array $parameters
    ) {
        // If this issue type has been suppressed in
        // the config, ignore it
        if (!Config::get()->disable_suppression
            && in_array($issue_type,
            Config::get()->suppress_issue_types ?? [])
        ) {
            return;
        }
        // If a white-list of allowed issue types is defined,
        // only emit issues on the white-list
        if (!Config::get()->disable_suppression
            && count(Config::get()->whitelist_issue_types) > 0
            && !in_array($issue_type,
                Config::get()->whitelist_issue_types ?? [])
        ) {
            return;
        }

        if (!Config::get()->disable_suppression
            && $context->hasSuppressIssue($code_base, $issue_type)
        ) {
            return;
        }

        Issue::emitWithParameters(
            $issue_type,
            $context->getFile(),
            $lineno,
            $parameters
        );

    }
}
